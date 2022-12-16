'use strict';

var ii = 0;

function prompt(text){
    $('#dialog-text').width("0");
    $('#dialog-text span').text(text);
    var spanWidth = $('#dialog-text span').width();
    $('#dialog-text').animate( { width: spanWidth +50 }, 500);
}

function triggerAnimation(array){
    switch (animations[ii][0]) {
        case 'change':
            var user_index = animations[ii][2];
            if(data['users_pokemon_index'][user_index] < 4 + user_index)
                {data['users_pokemon_index'][user_index] += 2;
                data['pokemon_user'][user_index] = data['draft'][data['users_pokemon_index'][user_index]];
                data['users_hp'][user_index] = data['pokemon_user'][user_index]['pv_max'];
                $('#hidden-form').val(JSON.stringify(data));
                $('#pokemon-name-user-' + user_index).text(data['pokemon_user'][user_index]['name']);
                $('#current-user-pkmn-' + user_index).attr('src', "https://img.pokemondb.net/sprites/brilliant-diamond-shining-pearl/normal/" + data['pokemon_user'][user_index]['name'] + ".png");
                $('#hp-user-' + user_index).text('HP : ' + data['users_hp'][user_index] + ' / ' + data['users_hp'][user_index]);
                prompt(animations[ii][1]);
            }
          break;
        case 'action':
            user_index = animations[ii][2];
            text = data['pokemon_user'][user_index]['name'] + " use "
            switch(animations[ii][1]){
                case 1:
                    prompt(text + "ATTACK");
                break;
                case 2:
                    prompt(text + "SP ATTACK");
                break;
                case 3:
                    prompt(text + "DEFENSE");
                break;
            }
        break;
        case 'init':
            prompt(animations[ii][1]);
          break;
        default:
            prompt(animations[ii][1]);
      }
}

$(window).ready(function () {
    triggerAnimation(animations[0][1]);
    $('#hidden-form').val(JSON.stringify(data));
    $('button').click(function(event) {
        event.stopPropagation();
        document.getElementById('hiddenField').value = animations;
    });
    
    $('body').click(function (e) { 
        e.preventDefault();
        ii = ii + 1;
        if(ii >= count - 1){
            $('button').css('display', 'block');
        }else{
        triggerAnimation(animations[ii][1]);
        }
    });
});


