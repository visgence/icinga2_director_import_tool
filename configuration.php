<?php
$section = $this->menuSection(
    N_('Director Import Tool')
)->setUrl('import_plugin/module/import')->setIcon('wrench'
)->setRenderer(array(
    'SummaryNavigationItemRenderer',
    'state' => 'critical'
));



$this->provideJsFile('importManager.js');



?>
