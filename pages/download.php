<?php

//region Server Information
$main_content .= '<table style="width:100%;margin-left:auto;margin-right:auto">
                  <tr bgcolor="' . $config['site']['vdarkborder'] . '">
                  <td colspan="2" style="color:white;font-weight:bold">Links</td>
                  </tr>';
//endregion

//region Client Link
$main_content .= '<tr bgcolor="' . $config['site']['lightborder'] . '">
                  <td style="font-weight:bold;width:150px">Client 7.72</td>
                  <td><a href=' . $config['site']['client'] . '>Link</a></td>
                  </tr>';
//endregion

//region Ip Changer Link
$main_content .= '<tr bgcolor="' . $config['site']['darkborder'] . '">
                  <td style="font-weight:bold;width:150px">Ip Changer</td>
                  <td><a href=' . $config['site']['ip_changer'] . '>Link</a></td>
                  </tr></table>';
//endregion


