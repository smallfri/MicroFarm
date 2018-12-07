@extends('layouts.layout-2')

@section('styles')
    <style>
        .icon-example {
            width: 70px;
            height: 70px;
            font-size: 20px;
            position: relative;
        }
        .icon-example:after {
            content: attr(data-title);
            display: none;
            position: absolute;
            background: #444;
            color: #fff;
            padding: 3px 6px;
            border-radius: 2px;
            bottom: 100%;
            left: 50%;
            font-weight: bold;
            transform: translate(-50%, -4px);
            font-size: 12px;
            white-space: nowrap;
        }
        .icon-example:hover:after {
            display: block;
        }
    </style>
@endsection

@section('scripts')
    <script>
        $(function() {
            var icons = [['fab', '500px'], ['fab', 'accessible-icon'], ['fab', 'accusoft'], ['fas', 'address-book'], ['far', 'address-book'], ['fas', 'address-card'], ['far', 'address-card'], ['fas', 'adjust'], ['fab', 'adn'], ['fab', 'adversal'], ['fab', 'affiliatetheme'], ['fab', 'algolia'], ['fas', 'align-center'], ['fas', 'align-justify'], ['fas', 'align-left'], ['fas', 'align-right'], ['fas', 'allergies'], ['fab', 'amazon'], ['fab', 'amazon-pay'], ['fas', 'ambulance'], ['fas', 'american-sign-language-interpreting'], ['fab', 'amilia'], ['fas', 'anchor'], ['fab', 'android'], ['fab', 'angellist'], ['fas', 'angle-double-down'], ['fas', 'angle-double-left'], ['fas', 'angle-double-right'], ['fas', 'angle-double-up'], ['fas', 'angle-down'], ['fas', 'angle-left'], ['fas', 'angle-right'], ['fas', 'angle-up'], ['fab', 'angrycreative'], ['fab', 'angular'], ['fab', 'app-store'], ['fab', 'app-store-ios'], ['fab', 'apper'], ['fab', 'apple'], ['fab', 'apple-pay'], ['fas', 'archive'], ['fas', 'arrow-alt-circle-down'], ['far', 'arrow-alt-circle-down'], ['fas', 'arrow-alt-circle-left'], ['far', 'arrow-alt-circle-left'], ['fas', 'arrow-alt-circle-right'], ['far', 'arrow-alt-circle-right'], ['fas', 'arrow-alt-circle-up'], ['far', 'arrow-alt-circle-up'], ['fas', 'arrow-circle-down'], ['fas', 'arrow-circle-left'], ['fas', 'arrow-circle-right'], ['fas', 'arrow-circle-up'], ['fas', 'arrow-down'], ['fas', 'arrow-left'], ['fas', 'arrow-right'], ['fas', 'arrow-up'], ['fas', 'arrows-alt'], ['fas', 'arrows-alt-h'], ['fas', 'arrows-alt-v'], ['fas', 'assistive-listening-systems'], ['fas', 'asterisk'], ['fab', 'asymmetrik'], ['fas', 'at'], ['fab', 'audible'], ['fas', 'audio-description'], ['fab', 'autoprefixer'], ['fab', 'avianex'], ['fab', 'aviato'], ['fab', 'aws'], ['fas', 'backward'], ['fas', 'balance-scale'], ['fas', 'ban'], ['fas', 'band-aid'], ['fab', 'bandcamp'], ['fas', 'barcode'], ['fas', 'bars'], ['fas', 'baseball-ball'], ['fas', 'basketball-ball'], ['fas', 'bath'], ['fas', 'battery-empty'], ['fas', 'battery-full'], ['fas', 'battery-half'], ['fas', 'battery-quarter'], ['fas', 'battery-three-quarters'], ['fas', 'bed'], ['fas', 'beer'], ['fab', 'behance'], ['fab', 'behance-square'], ['fas', 'bell'], ['far', 'bell'], ['fas', 'bell-slash'], ['far', 'bell-slash'], ['fas', 'bicycle'], ['fab', 'bimobject'], ['fas', 'binoculars'], ['fas', 'birthday-cake'], ['fab', 'bitbucket'], ['fab', 'bitcoin'], ['fab', 'bity'], ['fab', 'black-tie'], ['fab', 'blackberry'], ['fas', 'blender'], ['fas', 'blind'], ['fab', 'blogger'], ['fab', 'blogger-b'], ['fab', 'bluetooth'], ['fab', 'bluetooth-b'], ['fas', 'bold'], ['fas', 'bolt'], ['fas', 'bomb'], ['fas', 'book'], ['fas', 'book-open'], ['fas', 'bookmark'], ['far', 'bookmark'], ['fas', 'bowling-ball'], ['fas', 'box'], ['fas', 'box-open'], ['fas', 'boxes'], ['fas', 'braille'], ['fas', 'briefcase'], ['fas', 'briefcase-medical'], ['fas', 'broadcast-tower'], ['fas', 'broom'], ['fab', 'btc'], ['fas', 'bug'], ['fas', 'building'], ['far', 'building'], ['fas', 'bullhorn'], ['fas', 'bullseye'], ['fas', 'burn'], ['fab', 'buromobelexperte'], ['fas', 'bus'], ['fab', 'buysellads'], ['fas', 'calculator'], ['fas', 'calendar'], ['far', 'calendar'], ['fas', 'calendar-alt'], ['far', 'calendar-alt'], ['fas', 'calendar-check'], ['far', 'calendar-check'], ['fas', 'calendar-minus'], ['far', 'calendar-minus'], ['fas', 'calendar-plus'], ['far', 'calendar-plus'], ['fas', 'calendar-times'], ['far', 'calendar-times'], ['fas', 'camera'], ['fas', 'camera-retro'], ['fas', 'capsules'], ['fas', 'car'], ['fas', 'caret-down'], ['fas', 'caret-left'], ['fas', 'caret-right'], ['fas', 'caret-square-down'], ['far', 'caret-square-down'], ['fas', 'caret-square-left'], ['far', 'caret-square-left'], ['fas', 'caret-square-right'], ['far', 'caret-square-right'], ['fas', 'caret-square-up'], ['far', 'caret-square-up'], ['fas', 'caret-up'], ['fas', 'cart-arrow-down'], ['fas', 'cart-plus'], ['fab', 'cc-amazon-pay'], ['fab', 'cc-amex'], ['fab', 'cc-apple-pay'], ['fab', 'cc-diners-club'], ['fab', 'cc-discover'], ['fab', 'cc-jcb'], ['fab', 'cc-mastercard'], ['fab', 'cc-paypal'], ['fab', 'cc-stripe'], ['fab', 'cc-visa'], ['fab', 'centercode'], ['fas', 'certificate'], ['fas', 'chalkboard'], ['fas', 'chalkboard-teacher'], ['fas', 'chart-area'], ['fas', 'chart-bar'], ['far', 'chart-bar'], ['fas', 'chart-line'], ['fas', 'chart-pie'], ['fas', 'check'], ['fas', 'check-circle'], ['far', 'check-circle'], ['fas', 'check-square'], ['far', 'check-square'], ['fas', 'chess'], ['fas', 'chess-bishop'], ['fas', 'chess-board'], ['fas', 'chess-king'], ['fas', 'chess-knight'], ['fas', 'chess-pawn'], ['fas', 'chess-queen'], ['fas', 'chess-rook'], ['fas', 'chevron-circle-down'], ['fas', 'chevron-circle-left'], ['fas', 'chevron-circle-right'], ['fas', 'chevron-circle-up'], ['fas', 'chevron-down'], ['fas', 'chevron-left'], ['fas', 'chevron-right'], ['fas', 'chevron-up'], ['fas', 'child'], ['fab', 'chrome'], ['fas', 'church'], ['fas', 'circle'], ['far', 'circle'], ['fas', 'circle-notch'], ['fas', 'clipboard'], ['far', 'clipboard'], ['fas', 'clipboard-check'], ['fas', 'clipboard-list'], ['fas', 'clock'], ['far', 'clock'], ['fas', 'clone'], ['far', 'clone'], ['fas', 'closed-captioning'], ['far', 'closed-captioning'], ['fas', 'cloud'], ['fas', 'cloud-download-alt'], ['fas', 'cloud-upload-alt'], ['fab', 'cloudscale'], ['fab', 'cloudsmith'], ['fab', 'cloudversify'], ['fas', 'code'], ['fas', 'code-branch'], ['fab', 'codepen'], ['fab', 'codiepie'], ['fas', 'coffee'], ['fas', 'cog'], ['fas', 'cogs'], ['fas', 'coins'], ['fas', 'columns'], ['fas', 'comment'], ['far', 'comment'], ['fas', 'comment-alt'], ['far', 'comment-alt'], ['fas', 'comment-dots'], ['far', 'comment-dots'], ['fas', 'comment-slash'], ['fas', 'comments'], ['far', 'comments'], ['fas', 'compact-disc'], ['fas', 'compass'], ['far', 'compass'], ['fas', 'compress'], ['fab', 'connectdevelop'], ['fab', 'contao'], ['fas', 'copy'], ['far', 'copy'], ['fas', 'copyright'], ['far', 'copyright'], ['fas', 'couch'], ['fab', 'cpanel'], ['fab', 'creative-commons'], ['fab', 'creative-commons-by'], ['fab', 'creative-commons-nc'], ['fab', 'creative-commons-nc-eu'], ['fab', 'creative-commons-nc-jp'], ['fab', 'creative-commons-nd'], ['fab', 'creative-commons-pd'], ['fab', 'creative-commons-pd-alt'], ['fab', 'creative-commons-remix'], ['fab', 'creative-commons-sa'], ['fab', 'creative-commons-sampling'], ['fab', 'creative-commons-sampling-plus'], ['fab', 'creative-commons-share'], ['fas', 'credit-card'], ['far', 'credit-card'], ['fas', 'crop'], ['fas', 'crosshairs'], ['fas', 'crow'], ['fas', 'crown'], ['fab', 'css3'], ['fab', 'css3-alt'], ['fas', 'cube'], ['fas', 'cubes'], ['fas', 'cut'], ['fab', 'cuttlefish'], ['fab', 'd-and-d'], ['fab', 'dashcube'], ['fas', 'database'], ['fas', 'deaf'], ['fab', 'delicious'], ['fab', 'deploydog'], ['fab', 'deskpro'], ['fas', 'desktop'], ['fab', 'deviantart'], ['fas', 'diagnoses'], ['fas', 'dice'], ['fas', 'dice-five'], ['fas', 'dice-four'], ['fas', 'dice-one'], ['fas', 'dice-six'], ['fas', 'dice-three'], ['fas', 'dice-two'], ['fab', 'digg'], ['fab', 'digital-ocean'], ['fab', 'discord'], ['fab', 'discourse'], ['fas', 'divide'], ['fas', 'dna'], ['fab', 'dochub'], ['fab', 'docker'], ['fas', 'dollar-sign'], ['fas', 'dolly'], ['fas', 'dolly-flatbed'], ['fas', 'donate'], ['fas', 'door-closed'], ['fas', 'door-open'], ['fas', 'dot-circle'], ['far', 'dot-circle'], ['fas', 'dove'], ['fas', 'download'], ['fab', 'draft2digital'], ['fab', 'dribbble'], ['fab', 'dribbble-square'], ['fab', 'dropbox'], ['fab', 'drupal'], ['fas', 'dumbbell'], ['fab', 'dyalog'], ['fab', 'earlybirds'], ['fab', 'ebay'], ['fab', 'edge'], ['fas', 'edit'], ['far', 'edit'], ['fas', 'eject'], ['fab', 'elementor'], ['fas', 'ellipsis-h'], ['fas', 'ellipsis-v'], ['fab', 'ember'], ['fab', 'empire'], ['fas', 'envelope'], ['far', 'envelope'], ['fas', 'envelope-open'], ['far', 'envelope-open'], ['fas', 'envelope-square'], ['fab', 'envira'], ['fas', 'equals'], ['fas', 'eraser'], ['fab', 'erlang'], ['fab', 'ethereum'], ['fab', 'etsy'], ['fas', 'euro-sign'], ['fas', 'exchange-alt'], ['fas', 'exclamation'], ['fas', 'exclamation-circle'], ['fas', 'exclamation-triangle'], ['fas', 'expand'], ['fas', 'expand-arrows-alt'], ['fab', 'expeditedssl'], ['fas', 'external-link-alt'], ['fas', 'external-link-square-alt'], ['fas', 'eye'], ['far', 'eye'], ['fas', 'eye-dropper'], ['fas', 'eye-slash'], ['far', 'eye-slash'], ['fab', 'facebook'], ['fab', 'facebook-f'], ['fab', 'facebook-messenger'], ['fab', 'facebook-square'], ['fas', 'fast-backward'], ['fas', 'fast-forward'], ['fas', 'fax'], ['fas', 'feather'], ['fas', 'female'], ['fas', 'fighter-jet'], ['fas', 'file'], ['far', 'file'], ['fas', 'file-alt'], ['far', 'file-alt'], ['fas', 'file-archive'], ['far', 'file-archive'], ['fas', 'file-audio'], ['far', 'file-audio'], ['fas', 'file-code'], ['far', 'file-code'], ['fas', 'file-excel'], ['far', 'file-excel'], ['fas', 'file-image'], ['far', 'file-image'], ['fas', 'file-medical'], ['fas', 'file-medical-alt'], ['fas', 'file-pdf'], ['far', 'file-pdf'], ['fas', 'file-powerpoint'], ['far', 'file-powerpoint'], ['fas', 'file-video'], ['far', 'file-video'], ['fas', 'file-word'], ['far', 'file-word'], ['fas', 'film'], ['fas', 'filter'], ['fas', 'fire'], ['fas', 'fire-extinguisher'], ['fab', 'firefox'], ['fas', 'first-aid'], ['fab', 'first-order'], ['fab', 'first-order-alt'], ['fab', 'firstdraft'], ['fas', 'flag'], ['far', 'flag'], ['fas', 'flag-checkered'], ['fas', 'flask'], ['fab', 'flickr'], ['fab', 'flipboard'], ['fab', 'fly'], ['fas', 'folder'], ['far', 'folder'], ['fas', 'folder-open'], ['far', 'folder-open'], ['fas', 'font'], ['fab', 'font-awesome'], ['fab', 'font-awesome-alt'], ['fab', 'font-awesome-flag'], ['fas', 'font-awesome-logo-full'], ['far', 'font-awesome-logo-full'], ['fab', 'font-awesome-logo-full'], ['fab', 'fonticons'], ['fab', 'fonticons-fi'], ['fas', 'football-ball'], ['fab', 'fort-awesome'], ['fab', 'fort-awesome-alt'], ['fab', 'forumbee'], ['fas', 'forward'], ['fab', 'foursquare'], ['fab', 'free-code-camp'], ['fab', 'freebsd'], ['fas', 'frog'], ['fas', 'frown'], ['far', 'frown'], ['fab', 'fulcrum'], ['fas', 'futbol'], ['far', 'futbol'], ['fab', 'galactic-republic'], ['fab', 'galactic-senate'], ['fas', 'gamepad'], ['fas', 'gas-pump'], ['fas', 'gavel'], ['fas', 'gem'], ['far', 'gem'], ['fas', 'genderless'], ['fab', 'get-pocket'], ['fab', 'gg'], ['fab', 'gg-circle'], ['fas', 'gift'], ['fab', 'git'], ['fab', 'git-square'], ['fab', 'github'], ['fab', 'github-alt'], ['fab', 'github-square'], ['fab', 'gitkraken'], ['fab', 'gitlab'], ['fab', 'gitter'], ['fas', 'glass-martini'], ['fas', 'glasses'], ['fab', 'glide'], ['fab', 'glide-g'], ['fas', 'globe'], ['fab', 'gofore'], ['fas', 'golf-ball'], ['fab', 'goodreads'], ['fab', 'goodreads-g'], ['fab', 'google'], ['fab', 'google-drive'], ['fab', 'google-play'], ['fab', 'google-plus'], ['fab', 'google-plus-g'], ['fab', 'google-plus-square'], ['fab', 'google-wallet'], ['fas', 'graduation-cap'], ['fab', 'gratipay'], ['fab', 'grav'], ['fas', 'greater-than'], ['fas', 'greater-than-equal'], ['fab', 'gripfire'], ['fab', 'grunt'], ['fab', 'gulp'], ['fas', 'h-square'], ['fab', 'hacker-news'], ['fab', 'hacker-news-square'], ['fas', 'hand-holding'], ['fas', 'hand-holding-heart'], ['fas', 'hand-holding-usd'], ['fas', 'hand-lizard'], ['far', 'hand-lizard'], ['fas', 'hand-paper'], ['far', 'hand-paper'], ['fas', 'hand-peace'], ['far', 'hand-peace'], ['fas', 'hand-point-down'], ['far', 'hand-point-down'], ['fas', 'hand-point-left'], ['far', 'hand-point-left'], ['fas', 'hand-point-right'], ['far', 'hand-point-right'], ['fas', 'hand-point-up'], ['far', 'hand-point-up'], ['fas', 'hand-pointer'], ['far', 'hand-pointer'], ['fas', 'hand-rock'], ['far', 'hand-rock'], ['fas', 'hand-scissors'], ['far', 'hand-scissors'], ['fas', 'hand-spock'], ['far', 'hand-spock'], ['fas', 'hands'], ['fas', 'hands-helping'], ['fas', 'handshake'], ['far', 'handshake'], ['fas', 'hashtag'], ['fas', 'hdd'], ['far', 'hdd'], ['fas', 'heading'], ['fas', 'headphones'], ['fas', 'heart'], ['far', 'heart'], ['fas', 'heartbeat'], ['fas', 'helicopter'], ['fab', 'hips'], ['fab', 'hire-a-helper'], ['fas', 'history'], ['fas', 'hockey-puck'], ['fas', 'home'], ['fab', 'hooli'], ['fas', 'hospital'], ['far', 'hospital'], ['fas', 'hospital-alt'], ['fas', 'hospital-symbol'], ['fab', 'hotjar'], ['fas', 'hourglass'], ['far', 'hourglass'], ['fas', 'hourglass-end'], ['fas', 'hourglass-half'], ['fas', 'hourglass-start'], ['fab', 'houzz'], ['fab', 'html5'], ['fab', 'hubspot'], ['fas', 'i-cursor'], ['fas', 'id-badge'], ['far', 'id-badge'], ['fas', 'id-card'], ['far', 'id-card'], ['fas', 'id-card-alt'], ['fas', 'image'], ['far', 'image'], ['fas', 'images'], ['far', 'images'], ['fab', 'imdb'], ['fas', 'inbox'], ['fas', 'indent'], ['fas', 'industry'], ['fas', 'infinity'], ['fas', 'info'], ['fas', 'info-circle'], ['fab', 'instagram'], ['fab', 'internet-explorer'], ['fab', 'ioxhost'], ['fas', 'italic'], ['fab', 'itunes'], ['fab', 'itunes-note'], ['fab', 'java'], ['fab', 'jedi-order'], ['fab', 'jenkins'], ['fab', 'joget'], ['fab', 'joomla'], ['fab', 'js'], ['fab', 'js-square'], ['fab', 'jsfiddle'], ['fas', 'key'], ['fab', 'keybase'], ['fas', 'keyboard'], ['far', 'keyboard'], ['fab', 'keycdn'], ['fab', 'kickstarter'], ['fab', 'kickstarter-k'], ['fas', 'kiwi-bird'], ['fab', 'korvue'], ['fas', 'language'], ['fas', 'laptop'], ['fab', 'laravel'], ['fab', 'lastfm'], ['fab', 'lastfm-square'], ['fas', 'leaf'], ['fab', 'leanpub'], ['fas', 'lemon'], ['far', 'lemon'], ['fab', 'less'], ['fas', 'less-than'], ['fas', 'less-than-equal'], ['fas', 'level-down-alt'], ['fas', 'level-up-alt'], ['fas', 'life-ring'], ['far', 'life-ring'], ['fas', 'lightbulb'], ['far', 'lightbulb'], ['fab', 'line'], ['fas', 'link'], ['fab', 'linkedin'], ['fab', 'linkedin-in'], ['fab', 'linode'], ['fab', 'linux'], ['fas', 'lira-sign'], ['fas', 'list'], ['fas', 'list-alt'], ['far', 'list-alt'], ['fas', 'list-ol'], ['fas', 'list-ul'], ['fas', 'location-arrow'], ['fas', 'lock'], ['fas', 'lock-open'], ['fas', 'long-arrow-alt-down'], ['fas', 'long-arrow-alt-left'], ['fas', 'long-arrow-alt-right'], ['fas', 'long-arrow-alt-up'], ['fas', 'low-vision'], ['fab', 'lyft'], ['fab', 'magento'], ['fas', 'magic'], ['fas', 'magnet'], ['fas', 'male'], ['fab', 'mandalorian'], ['fas', 'map'], ['far', 'map'], ['fas', 'map-marker'], ['fas', 'map-marker-alt'], ['fas', 'map-pin'], ['fas', 'map-signs'], ['fas', 'mars'], ['fas', 'mars-double'], ['fas', 'mars-stroke'], ['fas', 'mars-stroke-h'], ['fas', 'mars-stroke-v'], ['fab', 'mastodon'], ['fab', 'maxcdn'], ['fab', 'medapps'], ['fab', 'medium'], ['fab', 'medium-m'], ['fas', 'medkit'], ['fab', 'medrt'], ['fab', 'meetup'], ['fas', 'meh'], ['far', 'meh'], ['fas', 'memory'], ['fas', 'mercury'], ['fas', 'microchip'], ['fas', 'microphone'], ['fas', 'microphone-alt'], ['fas', 'microphone-alt-slash'], ['fas', 'microphone-slash'], ['fab', 'microsoft'], ['fas', 'minus'], ['fas', 'minus-circle'], ['fas', 'minus-square'], ['far', 'minus-square'], ['fab', 'mix'], ['fab', 'mixcloud'], ['fab', 'mizuni'], ['fas', 'mobile'], ['fas', 'mobile-alt'], ['fab', 'modx'], ['fab', 'monero'], ['fas', 'money-bill'], ['fas', 'money-bill-alt'], ['far', 'money-bill-alt'], ['fas', 'money-bill-wave'], ['fas', 'money-bill-wave-alt'], ['fas', 'money-check'], ['fas', 'money-check-alt'], ['fas', 'moon'], ['far', 'moon'], ['fas', 'motorcycle'], ['fas', 'mouse-pointer'], ['fas', 'music'], ['fab', 'napster'], ['fas', 'neuter'], ['fas', 'newspaper'], ['far', 'newspaper'], ['fab', 'nintendo-switch'], ['fab', 'node'], ['fab', 'node-js'], ['fas', 'not-equal'], ['fas', 'notes-medical'], ['fab', 'npm'], ['fab', 'ns8'], ['fab', 'nutritionix'], ['fas', 'object-group'], ['far', 'object-group'], ['fas', 'object-ungroup'], ['far', 'object-ungroup'], ['fab', 'odnoklassniki'], ['fab', 'odnoklassniki-square'], ['fab', 'old-republic'], ['fab', 'opencart'], ['fab', 'openid'], ['fab', 'opera'], ['fab', 'optin-monster'], ['fab', 'osi'], ['fas', 'outdent'], ['fab', 'page4'], ['fab', 'pagelines'], ['fas', 'paint-brush'], ['fas', 'palette'], ['fab', 'palfed'], ['fas', 'pallet'], ['fas', 'paper-plane'], ['far', 'paper-plane'], ['fas', 'paperclip'], ['fas', 'parachute-box'], ['fas', 'paragraph'], ['fas', 'parking'], ['fas', 'paste'], ['fab', 'patreon'], ['fas', 'pause'], ['fas', 'pause-circle'], ['far', 'pause-circle'], ['fas', 'paw'], ['fab', 'paypal'], ['fas', 'pen-square'], ['fas', 'pencil-alt'], ['fas', 'people-carry'], ['fas', 'percent'], ['fas', 'percentage'], ['fab', 'periscope'], ['fab', 'phabricator'], ['fab', 'phoenix-framework'], ['fab', 'phoenix-squadron'], ['fas', 'phone'], ['fas', 'phone-slash'], ['fas', 'phone-square'], ['fas', 'phone-volume'], ['fab', 'php'], ['fab', 'pied-piper'], ['fab', 'pied-piper-alt'], ['fab', 'pied-piper-hat'], ['fab', 'pied-piper-pp'], ['fas', 'piggy-bank'], ['fas', 'pills'], ['fab', 'pinterest'], ['fab', 'pinterest-p'], ['fab', 'pinterest-square'], ['fas', 'plane'], ['fas', 'play'], ['fas', 'play-circle'], ['far', 'play-circle'], ['fab', 'playstation'], ['fas', 'plug'], ['fas', 'plus'], ['fas', 'plus-circle'], ['fas', 'plus-square'], ['far', 'plus-square'], ['fas', 'podcast'], ['fas', 'poo'], ['fas', 'portrait'], ['fas', 'pound-sign'], ['fas', 'power-off'], ['fas', 'prescription-bottle'], ['fas', 'prescription-bottle-alt'], ['fas', 'print'], ['fas', 'procedures'], ['fab', 'product-hunt'], ['fas', 'project-diagram'], ['fab', 'pushed'], ['fas', 'puzzle-piece'], ['fab', 'python'], ['fab', 'qq'], ['fas', 'qrcode'], ['fas', 'question'], ['fas', 'question-circle'], ['far', 'question-circle'], ['fas', 'quidditch'], ['fab', 'quinscape'], ['fab', 'quora'], ['fas', 'quote-left'], ['fas', 'quote-right'], ['fab', 'r-project'], ['fas', 'random'], ['fab', 'ravelry'], ['fab', 'react'], ['fab', 'readme'], ['fab', 'rebel'], ['fas', 'receipt'], ['fas', 'recycle'], ['fab', 'red-river'], ['fab', 'reddit'], ['fab', 'reddit-alien'], ['fab', 'reddit-square'], ['fas', 'redo'], ['fas', 'redo-alt'], ['fas', 'registered'], ['far', 'registered'], ['fab', 'rendact'], ['fab', 'renren'], ['fas', 'reply'], ['fas', 'reply-all'], ['fab', 'replyd'], ['fab', 'researchgate'], ['fab', 'resolving'], ['fas', 'retweet'], ['fas', 'ribbon'], ['fas', 'road'], ['fas', 'robot'], ['fas', 'rocket'], ['fab', 'rocketchat'], ['fab', 'rockrms'], ['fas', 'rss'], ['fas', 'rss-square'], ['fas', 'ruble-sign'], ['fas', 'ruler'], ['fas', 'ruler-combined'], ['fas', 'ruler-horizontal'], ['fas', 'ruler-vertical'], ['fas', 'rupee-sign'], ['fab', 'safari'], ['fab', 'sass'], ['fas', 'save'], ['far', 'save'], ['fab', 'schlix'], ['fas', 'school'], ['fas', 'screwdriver'], ['fab', 'scribd'], ['fas', 'search'], ['fas', 'search-minus'], ['fas', 'search-plus'], ['fab', 'searchengin'], ['fas', 'seedling'], ['fab', 'sellcast'], ['fab', 'sellsy'], ['fas', 'server'], ['fab', 'servicestack'], ['fas', 'share'], ['fas', 'share-alt'], ['fas', 'share-alt-square'], ['fas', 'share-square'], ['far', 'share-square'], ['fas', 'shekel-sign'], ['fas', 'shield-alt'], ['fas', 'ship'], ['fas', 'shipping-fast'], ['fab', 'shirtsinbulk'], ['fas', 'shoe-prints'], ['fas', 'shopping-bag'], ['fas', 'shopping-basket'], ['fas', 'shopping-cart'], ['fas', 'shower'], ['fas', 'sign'], ['fas', 'sign-in-alt'], ['fas', 'sign-language'], ['fas', 'sign-out-alt'], ['fas', 'signal'], ['fab', 'simplybuilt'], ['fab', 'sistrix'], ['fas', 'sitemap'], ['fab', 'sith'], ['fas', 'skull'], ['fab', 'skyatlas'], ['fab', 'skype'], ['fab', 'slack'], ['fab', 'slack-hash'], ['fas', 'sliders-h'], ['fab', 'slideshare'], ['fas', 'smile'], ['far', 'smile'], ['fas', 'smoking'], ['fas', 'smoking-ban'], ['fab', 'snapchat'], ['fab', 'snapchat-ghost'], ['fab', 'snapchat-square'], ['fas', 'snowflake'], ['far', 'snowflake'], ['fas', 'sort'], ['fas', 'sort-alpha-down'], ['fas', 'sort-alpha-up'], ['fas', 'sort-amount-down'], ['fas', 'sort-amount-up'], ['fas', 'sort-down'], ['fas', 'sort-numeric-down'], ['fas', 'sort-numeric-up'], ['fas', 'sort-up'], ['fab', 'soundcloud'], ['fas', 'space-shuttle'], ['fab', 'speakap'], ['fas', 'spinner'], ['fab', 'spotify'], ['fas', 'square'], ['far', 'square'], ['fas', 'square-full'], ['fab', 'stack-exchange'], ['fab', 'stack-overflow'], ['fas', 'star'], ['far', 'star'], ['fas', 'star-half'], ['far', 'star-half'], ['fab', 'staylinked'], ['fab', 'steam'], ['fab', 'steam-square'], ['fab', 'steam-symbol'], ['fas', 'step-backward'], ['fas', 'step-forward'], ['fas', 'stethoscope'], ['fab', 'sticker-mule'], ['fas', 'sticky-note'], ['far', 'sticky-note'], ['fas', 'stop'], ['fas', 'stop-circle'], ['far', 'stop-circle'], ['fas', 'stopwatch'], ['fas', 'store'], ['fas', 'store-alt'], ['fab', 'strava'], ['fas', 'stream'], ['fas', 'street-view'], ['fas', 'strikethrough'], ['fab', 'stripe'], ['fab', 'stripe-s'], ['fas', 'stroopwafel'], ['fab', 'studiovinari'], ['fab', 'stumbleupon'], ['fab', 'stumbleupon-circle'], ['fas', 'subscript'], ['fas', 'subway'], ['fas', 'suitcase'], ['fas', 'sun'], ['far', 'sun'], ['fab', 'superpowers'], ['fas', 'superscript'], ['fab', 'supple'], ['fas', 'sync'], ['fas', 'sync-alt'], ['fas', 'syringe'], ['fas', 'table'], ['fas', 'table-tennis'], ['fas', 'tablet'], ['fas', 'tablet-alt'], ['fas', 'tablets'], ['fas', 'tachometer-alt'], ['fas', 'tag'], ['fas', 'tags'], ['fas', 'tape'], ['fas', 'tasks'], ['fas', 'taxi'], ['fab', 'teamspeak'], ['fab', 'telegram'], ['fab', 'telegram-plane'], ['fab', 'tencent-weibo'], ['fas', 'terminal'], ['fas', 'text-height'], ['fas', 'text-width'], ['fas', 'th'], ['fas', 'th-large'], ['fas', 'th-list'], ['fab', 'themeisle'], ['fas', 'thermometer'], ['fas', 'thermometer-empty'], ['fas', 'thermometer-full'], ['fas', 'thermometer-half'], ['fas', 'thermometer-quarter'], ['fas', 'thermometer-three-quarters'], ['fas', 'thumbs-down'], ['far', 'thumbs-down'], ['fas', 'thumbs-up'], ['far', 'thumbs-up'], ['fas', 'thumbtack'], ['fas', 'ticket-alt'], ['fas', 'times'], ['fas', 'times-circle'], ['far', 'times-circle'], ['fas', 'tint'], ['fas', 'toggle-off'], ['fas', 'toggle-on'], ['fas', 'toolbox'], ['fab', 'trade-federation'], ['fas', 'trademark'], ['fas', 'train'], ['fas', 'transgender'], ['fas', 'transgender-alt'], ['fas', 'trash'], ['fas', 'trash-alt'], ['far', 'trash-alt'], ['fas', 'tree'], ['fab', 'trello'], ['fab', 'tripadvisor'], ['fas', 'trophy'], ['fas', 'truck'], ['fas', 'truck-loading'], ['fas', 'truck-moving'], ['fas', 'tshirt'], ['fas', 'tty'], ['fab', 'tumblr'], ['fab', 'tumblr-square'], ['fas', 'tv'], ['fab', 'twitch'], ['fab', 'twitter'], ['fab', 'twitter-square'], ['fab', 'typo3'], ['fab', 'uber'], ['fab', 'uikit'], ['fas', 'umbrella'], ['fas', 'underline'], ['fas', 'undo'], ['fas', 'undo-alt'], ['fab', 'uniregistry'], ['fas', 'universal-access'], ['fas', 'university'], ['fas', 'unlink'], ['fas', 'unlock'], ['fas', 'unlock-alt'], ['fab', 'untappd'], ['fas', 'upload'], ['fab', 'usb'], ['fas', 'user'], ['far', 'user'], ['fas', 'user-alt'], ['fas', 'user-alt-slash'], ['fas', 'user-astronaut'], ['fas', 'user-check'], ['fas', 'user-circle'], ['far', 'user-circle'], ['fas', 'user-clock'], ['fas', 'user-cog'], ['fas', 'user-edit'], ['fas', 'user-friends'], ['fas', 'user-graduate'], ['fas', 'user-lock'], ['fas', 'user-md'], ['fas', 'user-minus'], ['fas', 'user-ninja'], ['fas', 'user-plus'], ['fas', 'user-secret'], ['fas', 'user-shield'], ['fas', 'user-slash'], ['fas', 'user-tag'], ['fas', 'user-tie'], ['fas', 'user-times'], ['fas', 'users'], ['fas', 'users-cog'], ['fab', 'ussunnah'], ['fas', 'utensil-spoon'], ['fas', 'utensils'], ['fab', 'vaadin'], ['fas', 'venus'], ['fas', 'venus-double'], ['fas', 'venus-mars'], ['fab', 'viacoin'], ['fab', 'viadeo'], ['fab', 'viadeo-square'], ['fas', 'vial'], ['fas', 'vials'], ['fab', 'viber'], ['fas', 'video'], ['fas', 'video-slash'], ['fab', 'vimeo'], ['fab', 'vimeo-square'], ['fab', 'vimeo-v'], ['fab', 'vine'], ['fab', 'vk'], ['fab', 'vnv'], ['fas', 'volleyball-ball'], ['fas', 'volume-down'], ['fas', 'volume-off'], ['fas', 'volume-up'], ['fab', 'vuejs'], ['fas', 'walking'], ['fas', 'wallet'], ['fas', 'warehouse'], ['fab', 'weibo'], ['fas', 'weight'], ['fab', 'weixin'], ['fab', 'whatsapp'], ['fab', 'whatsapp-square'], ['fas', 'wheelchair'], ['fab', 'whmcs'], ['fas', 'wifi'], ['fab', 'wikipedia-w'], ['fas', 'window-close'], ['far', 'window-close'], ['fas', 'window-maximize'], ['far', 'window-maximize'], ['fas', 'window-minimize'], ['far', 'window-minimize'], ['fas', 'window-restore'], ['far', 'window-restore'], ['fab', 'windows'], ['fas', 'wine-glass'], ['fab', 'wolf-pack-battalion'], ['fas', 'won-sign'], ['fab', 'wordpress'], ['fab', 'wordpress-simple'], ['fab', 'wpbeginner'], ['fab', 'wpexplorer'], ['fab', 'wpforms'], ['fas', 'wrench'], ['fas', 'x-ray'], ['fab', 'xbox'], ['fab', 'xing'], ['fab', 'xing-square'], ['fab', 'y-combinator'], ['fab', 'yahoo'], ['fab', 'yandex'], ['fab', 'yandex-international'], ['fab', 'yelp'], ['fas', 'yen-sign'], ['fab', 'yoast'], ['fab', 'youtube'], ['fab', 'youtube-square']];
            var template = '<div id="icon-%icon-id%" data-title="%icon-class%" class="card icon-example d-inline-flex justify-content-center align-items-center my-2 mx-2"><i class="%icon% d-block"></i></div>'
            var $container = $('#icons-container');
    
            for (var i = 0, l = icons.length; i < l; i++) {
                $container.append($(template
                    .replace(/%icon\-id%/g, icons[i].join('-'))
                    .replace(/%icon%/g, icons[i][0] + ' fa-' + icons[i][1])
                    .replace(/%icon\-class%/g, '.' + icons[i][0] + '.fa-' + icons[i][1])
                ));
            }
    
            $('#icons-search').on('input', function() {
                var val = String(this.value).replace(/^\s+|\s+$/g, '');
    
                if (!val) return $container.find('> *').removeClass('d-none').addClass('d-inline-flex');
    
                $container.find('> *').removeClass('d-inline-flex').addClass('d-none');
    
                for (var j = 0, k = icons.length; j < k; j++) {
                    if (icons[j][1].indexOf(val) !== -1) {
                        $('#icon-' + icons[j].join('-')).removeClass('d-none').addClass('d-inline-flex');
                    }
                }
            });
        });
    </script>
@endsection

@section('content')
    <h4 class="font-weight-bold py-3 mb-4">
        <span class="text-muted font-weight-light">Icons /</span> Font Awesome 5
    </h4>

    <hr class="border-light container-m--x mt-0 mb-4">

    <div class="py-2 my-4 mx-auto" style="max-width:300px">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="ion ion-ios-search"></i></span>
            </div>
            <input type="text" class="form-control" id="icons-search" placeholder="Search...">
        </div>
    </div>

    <div id="icons-container" class="text-center"></div>
@endsection