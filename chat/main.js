$(document).ready(function(){
    console.log('hi!');
    $.ajax({
        url : 'chat-list.php',
        type : 'GET',
        success: function(response){
            let users = JSON.parse(response);
            let render ='';
            users.forEach(user => {
                render +=`
                <tr userID="${user.id}">
                    <td><a class ="item-user" href="#">${user.name} ${user.lastname}</a></td>
                </tr>`
            });
            $('#list').html(render);
        }
    });
    $(document).on('click','.item-user', function(){
        let item = $(this)[0].parentElement.parentElement;
        let id = $(item).attr('userID');
        $.post('select-chat.php',{id}, function(response){
            let users = JSON.parse(response);
            let fullname = users.name.concat(' ',users.lastname)
            $('#chat').html(fullname );
            $('#to').val(users.id);
        })
        list_messages(id);
    });
    function list_messages(id){
        $.post('messages.php',{id}, function(response){
            let messages = JSON.parse(response);
            let render ='';
            messages.forEach(messageline => {
                render +=`
                <div class="bg-primary">
                    <p>${messageline.message}</p>
                </div>`
            });
            $('#messages').html(render);
        })
    }
});
    