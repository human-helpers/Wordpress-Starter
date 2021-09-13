<?php
$search_form = get_search_form();
$copyright = sprintf(__("Copyright %s", "boldium"), date("Y"));
echo "
    <footer>
        $search_form
        <small>
            © $copyright
        </small>
    </footer>
";
