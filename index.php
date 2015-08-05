
<html>
<head>
    <title>Exam Fetcher Beta</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <script src="assets/jquery-2.1.3.min.js"></script>
    <script src="assets/jquery-ui.js"></script>
    <link rel="stylesheet" href="assets/jquery-ui.css" />
    <link rel="stylesheet" href="assets/font-awesome.min.css" />
    <!-- Text Core Plugin -->
    <link rel="stylesheet" href="assets/textext.core.css" />
    <link rel="stylesheet" href="assets/textext.plugin.autocomplete.css" />
    <link rel="stylesheet" href="assets/textext.plugin.tags.css" />

    <script src="assets/textext.core.js"></script>
    <script src="assets/textext.plugin.autocomplete.js"></script>
    <script src="assets/textext.plugin.tags.js"></script>
    <script src="assets/textext.plugin.suggestions.js"></script>
    <script src="assets/textext.plugin.filter.js"></script>
    <script src="assets/jquery.cookie.js"></script>

    <!--Others-->
    <script src='http://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.0/js/foundation.min.js'></script>
    <script src="assets/alert.js"></script>

    <link rel="stylesheet" href="assets/style.css" />

    <style>

    </style>
</head>

<body>
<div id="preloader">
    <div class="spinner-container">
        <svg class="spinner" width="65px" height="65px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
            <circle class="path" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle>
        </svg>
    </div>
</div>
<div class="centered grid__col--8" id="main" style="margin-top: 5%">
    <h1 style="text-align: center">Welcome to VCAA Exam Fetcher V2.1 (Beta).</h1>
    <h3 style="text-align: center"><a id="advanced-settings" style="text-decoration: underline; cursor: pointer;"> <i class="fa fa-cogs"></i> Advanced Settings</a></h3>

    <!-- Context Menu Download options -->
    <ul class="contextMenu" id="contextMenuDLOptions" hidden>
        <li><a id="download-file"><i class="fa fa-files-o"></i> Download To File</a></li>
        <li><a id="download-zip"><i class="fa fa-file-archive-o"></i> Download To Zip </a></li>
        <li><a id="share-exams"><i class="fa fa-share-square-o"></i> Share these exams </a></li>
        <li><a id="reset-table"><i class="fa fa-cog"></i> Reset </a> </li>
    </ul>

    <!--  Context Menu Advanced Settings -->
    <ul class="contextMenu" id="contextMenuAdvancedSettings" hidden>
        <li><a id="reload-home-cache" title="Use it when you have errors fetching your exam"><i class="fa fa-exclamation-triangle"></i> Reload Cache </a></li>
        <li><a id="toggle-auto-quickaccess" title="Tick it to present quick access panel when typing"> Enable auto quickaccess <input type="checkbox" class="checkbox" name="quickaccess-toggle" id="quickaccess-toggle" style="display: inline"> </a></li>
        <!--<li title="Use it for faster experience, but remember to delete them later"> Enable Super Cache: <input type="checkbox" class="checkbox" name="super-cache-checked" id="super-cache-checked" style="display: inline"> </li>
    <li><a id="delete-super-cache" title="Use it when you cannot fetch latest exams"><i class="fa fa-exclamation-triangle"></i> Delete Super Cache </a> </li>-->
    </ul>

    <!-- Context Menu More Options -->
    <ul class="contextMenu" id="contextMenuMoreOptions" hidden>
        <li><a id="download-this-one"><i class="fa fa-download"></i> Download this one</a></li>
        <li><a id="print-this-one"><i class="fa fa-print"></i> Print this one</a></li>
    </ul>

    <!-- Modal Send Mail -->
    <div class="modal-frame">
        <div class="modal">
            <div class="modal-inset">
                <div class="button close-modal">Close</div>
                <div class="modal-body">
                    <form id="share-email-form" method="post">
                        <h2>Share your exams !</h2>

                        <input type="email" placeholder="Enter your email" id="modal-from-email" name="modal-from-email" required="required" class="form__input" />
                        <input type="email" placeholder="Enter your friends Email" id="modal-to-email" name="modal-to-email" required="required" class="form__input" />

                        <h4>Email Contents (Do not modify the link!)</h4>
                        <div id="modal-content" name="modal-content" class="form__input" style="width:100%; padding: 10px" contenteditable="true"></div>
                        <div id="progress">

                        </div>
                        <input type="hidden" name="content-value" id="content-value" />
                        <input type="hidden" name="action" value="sendmail">
                        <input type="submit" name="submit" value="Send Now!">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal-overlay"></div>

    <!-- Slide Menu & Tag-Cloud -->
    <div class="slideItWrapper">
        <a href="#modal" class="slideIt">
            <span class="open">open</span>
            <span class="close">close</span>
        </a>
    </div>

    <aside id="pageslide">
        <div id="quick-access">
            <h3>Recent Searches</h3>
            <div id="recents">
                <div class="tag-cloud" id="tag-recents">

                </div>
            </div>
            <h3>Favourites | <<a id="fav-toggle">Click me:)</a>></h3>
            <div class="tag-cloud" id="tag-favourites">
            </div>
            <div id="add-favourites" style="width: 70%; height: 70%; margin: 0 auto; font-size: 12px; text-align: center; display: none">
                <input type="text" class="form__input" id="add-fav-field" placeholder="Load more for quick access!" />
                <a class="form__btn" id="fav-add-btn">Add to list</a>
            </div>
        </div>
    </aside>
    <div class="tab">

        <!-- Tab switches -->
        <div align="center">
            <ul class="tabs">
                <li><a href="#">Single mode</a></li>
                <li><a href="#">Bulk mode</a></li>
                <li><a href="#">Extraction mode</a></li>
            </ul>
        </div>


        <!-- Tab Contents -->
        <div class="tab_content">

            <div class="tabs_item" id="single_mode_tab">

                <div class="single" id="single">

                    <form id="sform" method="post">

                            <div id="container">
                                <div class="checkboxes" style="display: inline-block;margin: 0 auto;width:100%">
                                    <p align="center">
                                        <label>
                                            <input type="checkbox" class="checkbox" name="singlePaperChecked" checked /> Exams |</label>
                                        <label>
                                            <input type="checkbox" class="checkbox" name="singleReportChecked" checked/> Assessment reports </label>
                                    </p>
                                </div>
                                <div id="field_div_id_0">

                                    <h5>
                                        Enter your subject
                                    </h5>
                                    <input type="text" placeholder="Type a few characters and select a subject" name="field_div_id_0_subject" id="field_div_id_0_subject" class="form__input ui-autocomplete-input" autocomplete="off" required="required">
                                    <h5>
                                        Enter year
                                    </h5>
                                    <input type="text" placeholder="Type a few characters and select a year" name="field_div_id_0_year" id="field_div_id_0_year" class="form__input" required="required">
                                    <br>
                                </div>
                            </div>

                            <div align="center" id="singleBtns" style="margin-bottom: 30px">
                                <a class="btn paper paper-raise-flatten" id="addBtn" onclick="addField()">Add a new subject field</a>
                                <a class="btn paper paper-raise-flatten" id="removeBtn" onclick="removeField()" style="display: none;">Remove a subject field</a>
                            </div>

                            <input type="submit" id="submit" value="Click to view the exam!" />

                            <input type="hidden" name="counter" id="counter" />

                        <input type="hidden" name="modeIndicator" id="modeIndicator" value="0">

                        <input type="hidden" name="action" id="action" value="fetch">

                    </form>

                </div>
            </div>

            <div class="tabs_item" id="bulk_mode_tab">
                <div class="bulk" id="bulk">

                    <form id="bform" method="post">
                        <div class="checkboxes" style="display: inline-block;margin: 0 auto;width:100%">
                            <p align="center">
                                <label>
                                    <input type="checkbox" class="checkbox" name="bulkPaperChecked" checked /> Exams |</label>
                                <label>
                                    <input type="checkbox" class="checkbox" name="bulkReportChecked" checked/> Assessment reports </label>
                            </p>
                        </div>
                        <div style="">
                            <h5>Enter your subjects:</h5>
                            <input id="bulk_subject" placeholder="Type a few characters and select a subject" name="bulk_subject" class="form__input" style="width: 100% !important;" />
                            <h6>Notice: For subjects, please enter the name of subject from the beginning:<br/>
                                E.g. When searching for "English As Additional Language", you should start by typing "Eng.." instead of "EAL".
                            </h6>
                            <h5>Enter years:</h5>
                            <input id="bulk_year" placeholder="Type a few characters and select a year" name="bulk_year" class="form__input" style="width:100%; !important;" />
                            <div id="quick_year_selector" style="display: none">
                                <h5>From Year: <input type="text" name="from-year" id="from-year" class="form__input" style="display: inline;width: 20%" /> To Year: <input type="text" name="to-year" id="to-year" class="form__input" style="display: inline; width: 20%;">
                                    <h6>
                                        Notice: By filling in the start and end year, you will fetch all the exams of years in between.
                                    </h6>
                            </div>
                        </div>
                        <input type="submit" id="submit" name="submit" value="Click to view the exams!" style="margin-top: 20px">
                        <input type="hidden" id="modeIndicator" name="modeIndicator" value="1">
                        <input type="hidden" name="action" id="action" value="fetch">
                    </form>
                </div>
            </div>

            <div class="tabs_item" id="extraction_mode_tab">
                <div class="extraction">
                    <h5>Extraction mode provides a single gateway for extracting exam appendices, including formula sheet, data boolets etc... This database is
                    constantly updating. If you want your subject's extraction to be added, please contact <a href="mailto:info@fistudio.net">info@fistudio.net</a> </h5>
                    <form id="eform" method="post" action="function.php">
                        <div>
                            <h5>Enter a subject:</h5>
                            <input id="ext_subject" placeholder="Type a few characters and select an extraction" name="ext_subject" class="form__input" style="width:100% !important;" required="required">
                            <input type="hidden" name="ext_selected" id="ext_selected">
                            <input type="hidden" name="action" value="ext_download" >
                            <input type="submit" id="submit" value="Click to download now">
                        </div>
                    </form>
                </div>
            </div>

        </div>


    </div>

    <div id="post-result-div"></div>

    <iframe id="pdf-frame" style="display: none">

    </iframe>
    <!-- More Info -->
    <h5 style="text-align: center;"> This tool is under FISTUDIO&copy |Easy Exam Fetching Experience From 2002 - <?php echo date("Y")-1 ?> | We use cookie to enhance your fetching experience.</h5>
    <h5 style="text-align: center"> <a href="http://fistudio.net/?p=371" target="_blank" style="text-decoration: underline">Future Developments and change logs</a> | Report a bug to <a style="text-decoration: underline" href=mailto:info@fistudio.net>FISTUDIO</a> </h5>

</div>
<script src="assets/php.js" type="text/javascript"></script>
<script src="function.js" type="text/javascript"></script>
<script>
    //tracking
    setInterval(function() {
        if ($.cookie("fileLoading")) {
            // Remove cookie
            $.removeCookie('fileLoading', {
                path: '/'
            });
            // Success
            createInformationalAlertWithTitleAndDelay("Success!", 1700, true);
        }
    }, 1000);
</script>
</body>

</html>