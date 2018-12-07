<div class="ui-block">
    <h3 class="ui-block-heading">Bootstrap Sortable</h3>
    <a target="_blank" href="https://github.com/drvic10k/bootstrap-sortable" class="ui-block-description">https://github.com/drvic10k/bootstrap-sortable</a>

    <samp class="cui-example-code-static">
        &lt;link rel="stylesheet" href="&#123;&#123; mix('/vendor/libs/bootstrap-sortable/bootstrap-sortable.css') &#125;&#125;"&gt;
        &lt;script src="&#123;&#123; mix('/vendor/libs/bootstrap-sortable/bootstrap-sortable.js') &#125;&#125;"&gt;&lt;/script&gt;
    </samp>

    <h4 class="ui-block-heading">Examples</h4>

    <div class="cui-example cui-example-vertical-spacing">
        <div class="table-responsive">
            <table class='table table-bordered table-striped sortable'>
                <thead>
                    <tr>
                        <th style="width: 20%; vertical-align: middle;" rowspan="2" class='az' data-defaultsign="nospan" data-defaultsort="asc"><i class="ion ion-ios-navigate"></i>&nbsp; Name</th>
                        <th colspan="4" data-mainsort="3" style="text-align: center;">Results</th>
                        <th data-defaultsort="disabled"></th>
                    </tr>
                    <tr>
                        <th style="width: 20%" colspan="2" data-mainsort="1" data-firstsort="desc">Round 1</th>
                        <th style="width: 20%">Round 2</th>
                        <th style="width: 20%">Total</th>
                        <th style="width: 20%" data-defaultsign="month">Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Jack Jackson</td>
                        <td>30.51</td>
                        <td>17.77</td>
                        <td>14.99</td>
                        <td>63.27</td>
                        <td data-dateformat="DD-MM-YYYY">04-07-2013</td>
                    </tr>
                    <tr>
                        <td class="sorted">Steven White</td>
                        <td>6.21</td>
                        <td>67.31</td>
                        <td>84.32</td>
                        <td>157.84</td>
                        <td data-dateformat="DD-MM-YYYY">14-11-2016</td>
                    </tr>
                    <tr>
                        <td class="sorted">Peter White</td>
                        <td>15.53</td>
                        <td>7.54</td>
                        <td>37.36</td>
                        <td>60.43</td>
                        <td data-dateformat="DD-MM-YYYY">25-11-2012</td>
                    </tr>
                    <tr>
                        <td class="sorted">Steven Spielberg</td>
                        <td>0.25</td>
                        <td>7.74</td>
                        <td>15.19</td>
                        <td>23.18</td>
                        <td data-dateformat="DD-MM-YYYY">14-12-2001</td>
                    </tr>
                    <tr>
                        <td class="sorted">Frank White</td>
                        <td>24.81</td>
                        <td>5.02</td>
                        <td>18.1</td>
                        <td>47.93</td>
                        <td data-dateformat="DD-MM-YYYY">11.05.2016</td>
                    </tr>
                    <tr>
                        <td class="sorted">Peter Jackson</td>
                        <td>25.54</td>
                        <td>26.32</td>
                        <td>5.45</td>
                        <td>57.31</td>
                        <td data-dateformat="DD-MM-YYYY">09.04.2003</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
