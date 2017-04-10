function swap(id)
{
    var registered = document.querySelector(".selected_file");
    var not_registered = document.querySelector(".select_file");
    var target = document.getElementById(id.id);
    if (target.parentNode.id == "not_selected")
    {
	if (!document.getElementById("go"))
	{
	    var div = document.createElement('div');
	    div.className = "go_button";
	    div.id = "go";
	    var button = document.createElement('button');
	    button.className = "btn btn-primary";
	    button.innerHTML = "GO !";
	    button.onclick = make_graph;
	    document.body.appendChild(div);
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
    }
}

function make_graph()
{
    var file = document.getElementById("selected");
    file = file.childNodes[0].innerText;
    console.log(file);
}
