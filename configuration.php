<?php
$section = $this->menuSection(
    N_('Director Import Tool')
)->setUrl('icinga2-director-import-tool/module/import')->setIcon('wrench'
)->setRenderer(array(
    'SummaryNavigationItemRenderer',
    'state' => 'critical'
));



$this->provideJsFile('importManager.js');



?>
