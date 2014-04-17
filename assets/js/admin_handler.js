$(document).ready(function(){
	});	
	//添加
	function add(type){
		switch(type){
			case "problem":
				var title=$("#new_title").val();
				var con=editor.html();
				if(title==""||con=="") alert("请填写完整！");
				else{
					$.post("/admin/add_problem",{'title':title,'content':con},function(data){alert(data);location.reload();});
				}
			break;
			default:
			break;
		}
	}
	function delete_data(type,id){
		if(confirm("确定删除？")){
			switch(type){
				case "problem":
						$.post("/admin/delete_problem",
								{'pro_id':id},
								function(data){
									alert(data);
									location.reload();
								}
						);
					
				break;
				default:
				break;
			}
		}
	}
	