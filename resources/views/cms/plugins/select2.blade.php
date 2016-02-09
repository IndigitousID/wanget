{!! HTML::style('plugins/select2/select2.css') !!}
{!! HTML::script('plugins/select2/select2.js') !!}

<script>
	$('.select2').select2();

	$('.select-category').select2({
		placeholder: 'Entry category',
		minimumInputLength: 3,
		tags: false,
		ajax: {
			url: "{{ route('ajax.category.index') }}",
			dataType: 'json',
			data: function (term, path) {
				return {
					name: term,
					path : '{{ isset($data['path']) ? $data['path'] : '' }}'
				};
			},
		   results: function (data) {
				return {
					results: $.map(data, function (item) {
						return {
							text: item.name +' ',
							id: item.id +' ',
							path: item.path
						}
					})
				};
			},
			query: function (query){
				var data = {results: []};
				 
				$.each(preload_data_category, function(){
					if(query.term.length == 0 || this.text.toUpperCase().indexOf(query.term.toUpperCase()) >= 0 ){
						data.results.push({id: this.id, text: this.text });
					}
				});
	
				query.callback(data);
			}
		}
	});
	$('.select-category').select2('data', preload_data_category );

	$('.select-tag').select2({
		placeholder: 'Entry tag',
		minimumInputLength: 3,
		tags: false,
		ajax: {
			url: "{{ route('ajax.tag.index') }}",
			dataType: 'json',
			data: function (term, path) {
				return {
					name: term,
					path : '{{ isset($data['path']) ? $data['path'] : '' }}'
				};
			},
		   results: function (data) {
				return {
					results: $.map(data, function (item) {
						return {
							text: item.name +' ',
							id: item.id +' ',
							path: item.path
						}
					})
				};
			},
			query: function (query){
				var data = {results: []};
				 
				$.each(preload_data_tag, function(){
					if(query.term.length == 0 || this.text.toUpperCase().indexOf(query.term.toUpperCase()) >= 0 ){
						data.results.push({id: this.id, text: this.text });
					}
				});
	
				query.callback(data);
			}
		}
	});
	$('.select-tag').select2('data', preload_data_tag );
</script>