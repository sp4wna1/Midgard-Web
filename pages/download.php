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
                  <td><a href=' . $config['site']['client'] . '>Link</a></td>
                  </tr>';
//endregion

//region end Table
$main_content .= '</table>';
//endregion


