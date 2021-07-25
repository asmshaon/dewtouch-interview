<div class="alert  ">
<button class="close" data-dismiss="alert"></button>
Question: Advanced Input Field</div>

<p>
1. Make the Description, Quantity, Unit price field as text at first. When user clicks the text, it changes to input field for use to edit. Refer to the following video.

</p>


<p>
2. When user clicks the add button at left top of table, it wil auto insert a new row into the table with empty value. Pay attention to the input field name. For example the quantity field

<?php echo htmlentities('<input name="data[1][quantity]" class="">')?> ,  you have to change the data[1][quantity] to other name such as data[2][quantity] or data["any other not used number"][quantity]

</p>

<div class="alert alert-success">
<button class="close" data-dismiss="alert"></button>
The table you start with</div>

<table class="table table-striped table-bordered table-hover">
<thead>
<th><span id="add_item_button" class="btn mini green addbutton" onclick="addToObj=false">
											<i class="icon-plus"></i></span></th>
<th width="60%">Description</th>
<th width="20%">Quantity</th>
<th width="20%">Unit Price</th>
</thead>

<tbody id="item-table">
	<tr>
        <td style="text-align: center"><span id="remove_item_button" class="remove_button" onclick="addToObj=false"><i class="icon-remove"></i></span></td>
        <td class="editable"><span class="text"></span><textarea style="display: none" name="description[]" class="m-wrap description display_none input required" rows="2" ></textarea></td>
        <td class="editable"><span class="text"></span><input name="quantity[]" class="display_none number input" onkeypress="return onlyNumberKey(event)"></td>
        <td class="editable"><span class="text"></span><input name="unit_price[]" class="display_none number input" onkeypress="return validateFloatKeyPress(this, event, 10)"></td>
    </tr>
</tbody>

</table>

<p></p>
<div class="alert alert-info ">
<button class="close" data-dismiss="alert"></button>
Video Instruction</div>

<p style="text-align:left;">
<video width="78%"   controls>
  <source src="<?php echo Router::url("/video/q3_2.mov") ?>">
Your browser does not support the video tag.
</video>
</p>

<style>
    .description {
        background-color: #FFFFFF !important;
        width: 97.5%;
    }

    .display_none {
        display: none;
    }

    .text {
        display: inline;
        max-height: 70px;
        overflow: auto;
        float: left;
        width: 100%;
    }

    .input {
        border: 1px solid #ccc;
        line-height: 30px;
        width: 97.5%;
    }

    .input:focus-visible, .input:focus {
        border: 1px solid #999999 !important;
        line-height: 30px;
        width: 97.5%;
    }
</style>

<?php $this->start('script_own');?>
<script>
$(document).ready(function(){

    $("#add_item_button").click(function () {
        var html = '<tr>' +
            '<td style="text-align: center"><span id="remove_item_button" class="remove_button" onclick="addToObj=false"><i class="icon-remove"></i></span></td>' +
                '<td class="editable"><span class="text"></span><textarea style="display: none" name="description[]" class="m-wrap description display_none input required" rows="2" ></textarea></td>' +
                '<td class="editable"><span class="text"></span><input name="quantity[]" class="display_none number input" onkeypress="return onlyNumberKey(event)"></td>' +
                '<td class="editable"><span class="text"></span><input name="unit_price[]" class="display_none number input" onkeypress="return validateFloatKeyPress(this, event, 10)"></td>' +
            '</tr>';

        $("#item-table").prepend(html);
    });

    $(document).on('click', ".remove_button", function () {
        $(this).parent().parent().remove();
    });

    $(document).on('click', ".editable", function () {
        $(this).children('.text').hide();
        $(this).children('.input').show().focus();
    });

    $(document).on('focusout', ".input", function () {
        $(this).hide();
        $(this).prev('.text').html($(this).val().replace(/\n/g, "<br />")).show();
    });

});
</script>
<?php $this->end();?>

