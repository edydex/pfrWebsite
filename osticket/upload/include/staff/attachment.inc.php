<?php
if(!defined('OSTADMININC') || !$thisuser->isadmin()) die('Access Denied');
//Get the config info.
$config=($errors && $_POST)?Format::input($_POST):$cfg->getConfig();
if (empty($config['upload_dir'])) {
	$syno_upload_dir = "/var/services/web/osticket/upload/attach_data";
} else {
	$syno_upload_dir = $config['upload_dir'];
}
?>
<table width="100%" border="0" cellspacing=0 cellpadding=0>
    <form action="admin.php?t=attach" method="post">
    <input type="hidden" name="t" value="attach">
    <tr>
      <td>
        <table width="100%" border="0" cellspacing=0 cellpadding=2 class="tform">
          <tr class="header">
            <td colspan=2>&nbsp;Attachments Settings</td>
          </tr>
          <tr class="subheader">
            <td colspan=2">
                Before enabling attachments make sure you understand the security settings and issues related to file uploads.</td>
          </tr>
          <tr>
            <th width="165">Allow Attachments:</th>
            <td>
              <input type="checkbox" name="allow_attachments" <?=$config['allow_attachments'] ?'checked':''?>><b>Allow Attachments</b>
                &nbsp; (<i>Global Setting</i>)
                &nbsp;<font class="error">&nbsp;<?=$errors['allow_attachments']?></font>
            </td>
          </tr>
          <tr>
            <th>Emailed Attachments:</th>
            <td>
                <input type="checkbox" name="allow_email_attachments" <?=$config['allow_email_attachments'] ? 'checked':''?> > Accept emailed files
                    &nbsp;<font class="warn">&nbsp;<?=$warn['allow_email_attachments']?></font>
            </td>
          </tr>
         <tr>
            <th>Online Attachments:</th>
            <td>
                <input type="checkbox" name="allow_online_attachments" <?=$config['allow_online_attachments'] ?'checked':''?> >
                    Allow online attachments upload<br/>&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="checkbox" name="allow_online_attachments_onlogin" <?=$config['allow_online_attachments_onlogin'] ?'checked':''?> >
                    Authenticated users Only. (<i>User must be logged in to upload files </i>)
                    <font class="warn">&nbsp;<?=$warn['allow_online_attachments']?></font>
            </td>
          </tr>
          <tr>
            <th>Staff Response Files:</th>
            <td>
                <input type="checkbox" name="email_attachments" <?=$config['email_attachments']?'checked':''?> >Email attachments to the user
            </td>
          </tr>
          <tr>
            <th nowrap>Maximum File Size:</th>
            <td>
              <input type="text" name="max_file_size" value="<?=$config['max_file_size']?>"> <i>bytes</i>
                <font class="error">&nbsp;<?=$errors['max_file_size']?></font>
            </td>
          </tr>
          <tr>
            <th>Attachment Folder:</th>
            <td>
                Web user (e.g apache) must have write access to the folder. &nbsp;<font class="error">&nbsp;<?=$errors['upload_dir']?></font><br>
              <input type="text" size=60 name="upload_dir" value="<?=$syno_upload_dir?>">
              <font color=red>
              <?=$attwarn?>
              </font>
            </td>
          </tr>
          <tr>
            <th valign="top"><br/>Accepted File Types:</th>
            <td>
                Enter file extensions allowed separated by a comma. e.g <i>.doc, .pdf, </i> <br>
                To accept all files enter wildcard <b><i>.*</i></b>&nbsp;&nbsp;i.e dotStar (NOT recommended).
                <textarea name="allowed_filetypes" cols="21" rows="4" style="width: 65%;" wrap=HARD ><?=$config['allowed_filetypes']?></textarea>
            </td>
          </tr>
        </table>
    </td></tr>
    <tr><td style="padding:10px 0 10px 200px">
        <input class="button" type="submit" name="submit" value="Save Changes">
        <input class="button" type="reset" name="reset" value="Reset Changes">
    </td></tr>
  </form>
</table>
