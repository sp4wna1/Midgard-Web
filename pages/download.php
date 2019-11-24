<?php

//region Server Information
$main_content .= '<table style="width:100%;margin-left:auto;margin-right:auto">
                  <tbody>
                  <tr bgcolor="' . $config['site']['vdarkborder'] . '">
                  <th width="33%" style="color:white;font-weight:bold">File</th>
                  <th width="33%" style="color:white;font-weight:bold">Type</th>
                  <th width="33%" style="color:white;font-weight:bold">Link</th>
                  </tr>
                  
                  
                  ';
//endregion

//region Client Link
$main_content .= '<tr bgcolor="' . $config['site']['lightborder'] . '">
                  <td style="font-weight:bold;width:150px">Client</td>
                  <td style="font-weight:bold;width:150px">Windows x64</td>
                  <td><a href=' . $config['site']['client'] . '>Download</a></td>
                  </tr>';
//endregion

//region end Table
$main_content .= '</tbody>
                  </table>';
//endregion


