<?php
$section = $this->menuSection(
    N_('Director Import Tool')
)->setUrl('director_icinga2-director-import-plugin/module/import')->setIcon('wrench'
)->setRenderer(array(
    'SummaryNavigationItemRenderer',
    'state' => 'critical'
));



$this->provideJsFile('importManager.js');



?>
