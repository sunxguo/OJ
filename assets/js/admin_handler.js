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
	//设置编辑器内容
	function setContent(type,pid){
		switch(type){
			case "problem":
				$.post("/admin/get_problem_detail",{'pid':pid},
						function(data){editor_new_id
							var Obj=$.parseJSON(data);
							$("#editor_new_id").val(pid);
							$("#editor_new_title").val(Obj.p_Title);
							editor1.html(Obj.p_Content);
						});
			break;
			default:
			break;
		}
	}
	//修改
	function modify(type){
		switch(type){
			case "problem":
				var title=$("#editor_new_title").val();
				var con=editor1.html();
				if(title==""||con=="") alert("请填写完整！");
				else{
					$.post("/admin/modify_problem",
							{'id':$("#editor_new_id").val(),'title':title,'content':con},
							function(data){
								alert(data);
								location.reload();
							}
					);
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
	