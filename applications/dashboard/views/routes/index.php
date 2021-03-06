<?php if (!defined('APPLICATION')) exit();
$Session = Gdn::Session();
?>
<h1><?php echo T('Manage Routes'); ?></h1>
<div class="FilterMenu"><?php echo Anchor('Add Route', 'dashboard/routes/add', 'AddRoute Button'); ?></div>
<div class="Info"><?php
   echo T('Routes can be used to redirect users to various parts of your site depending on the url. ');
   echo Anchor('Get more information on creating custom routes', 'http://vanillaforums.org/page/routes');
?></div>
<table class="AltColumns" id="RouteTable">
   <thead>
      <tr>
         <th><?php echo T('Route'); ?></th>
         <th class="Alt"><?php echo T('Target'); ?></th>
         <th class="Alt"><?php echo T('Type'); ?></th>
      </tr>
   </thead>
   <tbody>
<?php
$i = 0;
$Alt = FALSE;
foreach ($this->MyRoutes as $Route => $RouteData) {
   $Alt = !$Alt;
   
   $Target = $RouteData['Destination'];
   $RouteType = T(Gdn::Router()->RouteTypes[$RouteData['Type']]);
   $Reserved = $RouteData['Reserved'];
?>
   <tr<?php echo $Alt ? ' class="Alt"' : ''; ?>>
      <td class="Info">
         <strong><?php echo $Route; ?></strong>
         <div>
         <?php
         echo Anchor('Edit', '/dashboard/routes/edit/'.$RouteData['Key'], 'EditRoute');
         if (!$Reserved) {
            echo '<span>|</span>';
            echo Anchor('Delete', '/routes/delete/'.$RouteData['Key'].'/'.$Session->TransientKey(), 'DeleteRoute');
         }
         ?>
         </div>
      </td>
      <td class="Alt"><?php echo $Target; ?></td>
      <td class="Alt"><?php echo $RouteType; ?></td>
   </tr>
<?php
   ++$i;
}
?>
   </tbody>
</table>