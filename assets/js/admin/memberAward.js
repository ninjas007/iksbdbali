$('#addRow').click(function(){
	getAwards()
	.then((result) => {
		$('.table-row').after(`
			<tr>
			    <td>
			        <select name="award_id[]" class="form-control">
			        	`+result+`
			        </select>
			    </td>
			    <td>
			        <input type="text" class="form-control" name="link_google_drive[]">
			    </td>
			    <td class="text-center">
			        <button type="button" class="btn btn-sm btn-warning delete-row"><i class="fa fa-trash"></i></button>
			    </td>
			</tr>
		`);

		$('.delete-row').click(function(){
			$(this).parent().parent().remove();
		});
	})
	.catch((err) => {
		console.log(err);
	})
});

$('.delete-row').click(function(){
	$(this).parent().parent().remove();
});

const getAwards = function () {
	return new Promise(function(resolve, reject){
		return $.ajax({
			url: '../../../award/getAwardsJson',
			dataType: 'json',
			success: function(response) {
				let html = '';

				$.each(response, function(index, item){
					html += `<option value="${item.id_award}">${item.name_award}</option>`;
				});

				resolve(html);
			},
			error: function(err) {
				reject(err);
			}
		})
	})
}