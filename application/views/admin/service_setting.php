<details>
  <summary>Add Service Setting</summary>
  <p>
      <table class="w3-table-all">
        <thead>
          <tr class="w3-light-grey w3-hover-red">
            <th>Service Setting</th>
          </tr>
        </thead>
        <tr class="w3-hover-green">
<!---->
                         
                                <form action="<?php echo base_url('admin/service_setting_data/submit');?>" method="post" enctype="multipart/form-data">
                                    <div>
                                        <div class="w3-third">  
                                            <label>Add Fab Icon</label>
                                            <input type="text" name="fab_icon" class="form-control" placeholder="Add Fab Icon" required>
                                            <label>Add Event Name</label>
                                            <input type="text" name="event_name" class="form-control" placeholder="Enter Event" required>
                                            <label>Add Event Content</label>
                                            <input type="text" name="event_content" class="form-control" placeholder="Enter Event Content" required>
                                            <label>Add Ask Oppointment</label>
                                            <input type="text" name="ask_oppointment" class="form-control" placeholder="Enter Ask Oppointment" required>
                                            <label>Add Additional Information</label>
                                            <input type="text" name="additional_info" class="form-control" placeholder="Enter Null If Empty" required>
                                        </div>
                                        <div class="w3-twothird">
                                            <div style="padding-left:60px!important;"><button type="submit"><i class="fa fa-plus" style="font-size:28px;color:red">ADD</i></button></div>
                                        </div>
                                    </div>
                                </form>
<!---->
        </tr>
      </table>
  </p>
</details>
<?php
if(!empty($service_settings)):

?>
    <table class="w3-table-all">
    <thead>
      <tr class="w3-light-grey w3-hover-red">
        <th>id</th>
        <th>Fab Icon</th>
        <th>Event Name</th>
        <th>Event Content</th>
        <th>Ask Oppointment</th>
        <th>Additional Information</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <?php foreach($service_settings as $settings):?>
        <tr class="w3-hover-green">
          <td><?php echo $settings['id'];?></td>
          <td><?php echo $settings['fab_icon'];?></td>
          <td><?php echo $settings['event_name'];?></td>
          <td><?php echo $settings['event_content'];?></td>
          <td><?php echo $settings['ask_oppointment'];?></td>
          <td><?php echo $settings['additional_info'];?></td>
          <td><?php echo $settings['status'];?></td>
          <td></td>
        </tr>
    <?php endforeach;?>
  </table>
<?php  endif; ?>