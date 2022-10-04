<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Task 1</title>

        <link rel="stylesheet" type="text/css" href="<?php print url('css/style.css'); ?>" />
        <script type="text/javascript" src="<?php print url('js/jquery.js'); ?>"></script>

        <script type="text/javascript">
            var APP_URL = '<?php print env("APP_URL"); ?>';
        </script>

        <script type="text/javascript" src="<?php print url('js/script.js'); ?>"></script>
    </head>
    <body>
        <div id="task-container">
            <fieldset id="top">
                <legend class="title">User request</legend>

                <div id="task-head">
                    <ul>
                        <li>
                            Read page: <input type="number" value="1" size="3" id="read-page" />
                            <button id="go-read">Go</button>
                        </li>
                        <li>
                            Search: <input type="text" id="search" />
                            <button id="go-search">Go</button>
                        </li>
                        <li>
                            Update ID: <input type="number" size="3" id="update-id" />
                            <button id="go-update">Go</button>
                        </li>
                        <li>
                            <button id="go-create">Create record</button>
                        </li>
                    </ul>
                </div>

                <div id="request-more-wrapper">

                </div>
            </fieldset>

            <div id="task-body">
                <fieldset>
                    <legend class="title">Server response</legend>

                    <textarea id="response-wrapper" readonly="readonly"></textarea>
                </fieldset>
            </div>
        </div>

        <template id="tpl-create">
            <!-- Used for update action -->
            <input type="hidden" id="hidden-id" />

            <table>
                <tr>
                    <td>Name</td>
                    <td><input type="text" id="tpl-name" /></td>
                </tr>
                <tr>
                    <td>Surname</td>
                    <td><input type="text" id="tpl-surname" /></td>
                </tr>
                <tr>
                    <td>Identification No</td>
                    <td><input type="text" id="tpl-ident" /></td>
                </tr>
                <tr>
                    <td>Country</td>
                    <td><input type="text" id="tpl-country" /></td>
                </tr>
                <tr>
                    <td>Date of birth</td>
                    <td><input type="date" id="tpl-date" /></td>
                </tr>
                <tr>
                    <td></td>
                    <td><button id="trigger-create">Go</button></td>
                </tr>
            </table>
        </template>
    </body>
</html>