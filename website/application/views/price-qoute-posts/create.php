<h2><?= $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open_multipart('priceQoutePosts/create'); ?>
  <script src="http://cdn.ckeditor.com/4.5.11/standard/ckeditor.js"></script>

  <div class="form-group">
    <label>Description</label>
    <textarea id="editor1" class="form-control" name="description" placeholder="Add Description" required></textarea>
  </div>

  <div class="form-group">
    <label>Email</label>
    <input type="email" class="form-control" name="email" placeholder="email@example.com" required>
  </div>

  <div class="form-group">
    <label>Name</label>
    <input type="name" class="form-control" name="name" placeholder="John Doe" required>
  </div>

  <div class="form-group">
    <label>Phone Number</label>
    <input id="phoneNumber" type="text" class="form-control" name="phone_number" placeholder="xxx-xxx-xxxx" required>
  </div>

  <div class="form-group">
    <label>Upload Blueprint or Image</label>
	  <input type="file" name="userfile" size="200">
  </div>

  <button type="submit" class="btn btn-default">Submit</button>
</form>
<script>CKEDITOR.replace( 'editor1' );</script>
<script src="<?php echo base_url(); ?>assets/js/phoneNumberFormValidator.js"></script>

