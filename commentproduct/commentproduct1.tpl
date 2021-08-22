<form action="{$smarty.server.HTTP_HOST}{$smarty.server.REQUEST_URI}" method="post">
<fieldset class="form-group">
<label class="form-control-label" for="exampleInput1">Message</label>
<textarea required name="comment" class="form-control" id="comment" cols="30" rows="10"></textarea>
<br>
<input type="submit" class="btn btn-primary-outline" value="Submit">

</form>
