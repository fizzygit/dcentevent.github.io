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
  <summary>Add Testemonial</summary>
  <p>
      <table class="w3-table-all">
        <thead>
          <tr class="w3-light-grey w3-hover-red">
            <th>Testemonial Setting</th>
          </tr>
        </thead>
        <tr class="w3-hover-green">
<!---->
                         
                                <form action="<?php echo base_url('admin/add_testemonials/submit');?>" method="post" enctype="multipart/form-data">
                                    <div>
                                        <div class="w3-third"> 
                                            <label>Testemonial Content</label>
                                            <input type="text" name="testemonial_content" class="form-control" placeholder="Enter Content" required>
                                            <label>Testemonial Name</label>
                                            <input type="text" name="testemonial_name" class="form-control" placeholder="Enter Name" required>
                                            <label>Additional Information</label>
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
 <?//php if(!empty($all_settings))?>
    <table class="w3-table-all">
    <thead>
      <tr class="w3-light-grey w3-hover-red">
        <th>id</th>
        <th>System Name</th>
        <th>System Description</th>
        <th>Additional Description</th>
        <th>Action</th>
      </tr>
    </thead>
    <?//php foreach($all_settings as $settings):?>
        <tr class="w3-hover-green">
          <td><?//php echo $settings['id'];?></td>
          <td><?//php echo $settings['setting_name'];?></td>
          <td><?//php echo $settings['setting_desc'];?></td>
          <td><?//php echo $settings['additional_info'];?></td>
          <td>Action</td>
        </tr>
    <?//php endforeach;?>
  </table>


