$(document).ready(function(){
    console.log('hi!');
    //first ajax for loader chat-list in the left 
    $('#send-message').hide();
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
    // event for change the title chat and loader the menssages for the chat
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
        $('#send-message').show();
    });
    //fuction to get all the messages of a chat
    function list_messages(id){
        $.post('messages.php',{id}, function(response){
            console.log(response);
            let messages = JSON.parse(response);
            let render ='';
            //sub fucction to paint the message for know who is the message
            messages.forEach(messageline => {
                if(messageline.to === messageline.from){
                    render +=`
                    <div class="bg-primary">
                        <p>${messageline.message}</p>
                    </div>` 
                }else{
                    render +=`
                    <div class="bg-warning">
                    <p>${messageline.message}</p>
                    </div>`
                } 
                
            });
            $('#messages').html(render);
        })
    }
    $('#send-message').submit(function(e){
        const sendData = {
            message: $('#message').val(),
            from: $('#from').val(),
            to: $('#to').val(),
        };
        $.post('send.php',sendData, function(response){
            list_messages($('#to').val());
            $('#send-message').trigger('reset');             
        });
       
    });
});
    