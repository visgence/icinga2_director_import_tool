<?php
$section = $this->menuSection(
    N_('Director Import Tool')
)->setUrl('icinga2_director_import_tool/module/import')->setIcon('wrench'
)->setRenderer(array(
    'SummaryNavigationItemRenderer',
    'state' => 'critical'
));



$this->provideJsFile('importManager.js');



?>
