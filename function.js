function swap(id)
{
   /* var registered = document.querySelector(".selected_file");
    var not_registered = document.querySelector(".select_file");
    
    if (target.parentNode.id == "not_selected")
    {
	/*if (!document.getElementById("go"))
	{
	    var div = document.createElement('div');
	    div.className = "go_button";
	    div.id = "go";
	    var button = document.createElement('button');
	    button.className = "btn btn-primary";
	    button.innerHTML = "GO !";
	    button.onclick = refresh_page;
	    document.getElementById("for_go").appendChild(div);
	    div.appendChild(button);
	}
	var select = document.getElementById("selected");
	if (select != null)
	{
	    select.id = "not_selected";
	    not_registered.appendChild(select);
	}
	target.parentNode.id = "selected";
	registered.appendChild(target.parentNode);

	}*/
    var target = document.getElementById(id.id);
    document.location.href = "?file=" + target.id;
}
