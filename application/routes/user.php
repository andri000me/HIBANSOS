<?php
$route['tambahHibahBansos'] = 'ControllerHibahBansos/tambahHibahBansos';
$route['editHibahBansos/(:any)'] = 'ControllerHibahBansos/editHibahBansos/$1';
$route['hapusHibahBansos/(:any)'] = 'ControllerHibahBansos/hapusproposal/$1';
$route['proposalsaya'] = 'ControllerHibahBansos/daftarProposalSaya';
$route['uploadrevisi/(:any)'] = 'ControllerHibahBansos/upload_revisi/$1';
$route['uploadprogress/(:any)'] = 'ControllerHibahBansos/buatProgres/$1';
$route['uploadlpj/(:any)'] = 'ControllerHibahBansos/buatLPJ/$1';