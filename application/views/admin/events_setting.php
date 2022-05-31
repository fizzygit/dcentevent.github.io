<style>
details > summary {
  padding: 4px;
  width: 200px;
  background-color: #eeeeee;
  border: none;
  box-shadow: 1px 1px 2px #bbbbbb;
  cursor: pointer;
}

details > p {
  background-color: #eeeeee;
  padding: 4px;
  margin: 0;
  box-shadow: 1px 1px 2px #bbbbbb;
}
</style>
<details>
  <summary>Add Event</summary>
  <p>
      <table class="w3-table-all">
        <thead>
          <tr class="w3-light-grey w3-hover-red">
            <th>Event Setting</th>
          </tr>
        </thead>
        <tr class="w3-hover-green">
<!---->
                         
                                <form action="<?php echo base_url('admin/add_events/submit');?>" method="post" enctype="multipart/form-data">
                                    <div>
                                        <div class="w3-third"> 
                                            <label>Event Image</label>
                                            <input type="file" name="event_image" class="form-control" placeholder="Enter Content" required>
                                            <label>Event Name</label>
                                            <input type="text" name="event_name" class="form-control" placeholder="Enter Name" required>
                                            <label>Event Content</label>
                                            <input type="text" name="event_content" class="form-control" placeholder="Enter Null If Empty" required>
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
 <?php if(!empty($event_settings))?>
    <table class="w3-table-all">
    <thead>
      <tr class="w3-light-grey w3-hover-red">
        <th>id</th>
        <th>Event Name</th>
        <th>Event Image</th>
        <th>Event Content</th>
        <th>Action</th>
      </tr>
    </thead>
    <?php foreach($event_settings as $settings):?>
        <tr class="w3-hover-green">
          <td><?php echo $settings['id'];?></td>
          <td><?php echo $settings['event_name'];?></td>
          <td><img style="width:300px;height:200px;" src="<?php echo $settings['event_image'];?>"/></td>
          <td><?php echo $settings['event_content'];?></td>
          <td>Action</td>
        </tr>
    <?php endforeach;?>
  </table>


