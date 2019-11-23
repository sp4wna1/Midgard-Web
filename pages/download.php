<?php

//region Server Information
$main_content .= '<table style="width:100%;margin-left:auto;margin-right:auto">
                  <tr bgcolor="' . $config['site']['vdarkborder'] . '">
                  <td colspan="2" style="color:white;font-weight:bold">Links</td>
                  </tr>';
//endregion

//region Client Link
$main_content .= '<tr bgcolor="' . $config['site']['lightborder'] . '">
                  <td style="font-weight:bold;width:150px">Client próprio</td>
                  </tr>
                  <tr bgcolor="' . $config['site']['darkborder'] . '">
                  <td><a href=' . $config['site']['client'] . '>Link</a></td>
                  <td style="font-weight:bold;width:150px">Ucrtbased.dll</td>
                  </tr>
                  <tr bgcolor="' . $config['site']['lightborder'] . '">
                  <td style="font-weight:bold;width:150px">Vcruntime.dll</td>
                  <td><a href=' . $config['site']['vcruntime'] . '>Link</a></td>
                  </tr>
                  <tr bgcolor="' . $config['site']['darkborder'] . '">
                  <td style="font-weight:bold;width:150px">Msvcp140d.dll</td>
                  <td><a href=' . $config['site']['msvcp140d'] . '>Link</a></td>
                  </tr>';
//endregion

//region end Table
$main_content .= '</table>';
//endregion


