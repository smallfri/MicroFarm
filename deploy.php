<?php
namespace Deployer;

require 'recipe/laravel.php';

// Project name
set('application', 'my_project');

// Project repository
set('repository', 'https://github.com/smallfri/MicroFarm.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true); 

// Shared files/dirs between deploys 
add('shared_files', []);
add('shared_dirs', ['nova']);

// Writable dirs by web server 
add('writable_dirs', ['nova']);

task('build', '
    php artisan nova:user
    echo "Build done";
');




env('lock_path', '{{deploy_path}}/deploy.lock');

task('deploy:lock', function() {
    $res = run('[ -f {{lock_path}} ] && echo Locked || echo OK');

    if (trim($res) === "Locked") {
        throw new RuntimeException("Deployement is locked.");
    }

    run('touch {{lock_path}}');
});

task('deploy:unlock', function() {
    $res = run('[ -f {{lock_path}} ] && echo Locked || echo OK');

    if (trim($res) === "Locked") {
        run('rm {{lock_path}}');
    }
});

after('deploy:prepare', 'deploy:lock');
after('deploy:symlink', 'deploy:unlock');






// Hosts
host('ec2-35-175-208-140.compute-1.amazonaws.com')
    ->user('ubuntu')
    ->port(22)
    ->configFile('~/.ssh/config')
    ->identityFile('~/.ssh/appmicrokey.pem')
    ->forwardAgent(true)
    ->multiplexing(true)
    ->addSshOption('UserKnownHostsFile', '/dev/null')
    ->addSshOption('StrictHostKeyChecking', 'no')
    ->set('deploy_path', '~/var/www/html/microfarm');

// Tasks

task('build', function () {
    run('cd {{release_path}} && build');
});

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.

before('deploy:symlink', 'artisan:migrate');

