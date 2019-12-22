var path = window.location.pathname;
var host = window.location.hostname;

$(function(){
    // trigger moment locale
    moment.locale('id');

    // init select2
    $('.select2').select2()

    // datemask plugin
    $('#tanggal_lahir').inputmask('dd-mm-yyyy', { 'placeholder': 'dd-mm-yyyy' })
    // function toas sweat alert 2
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });

    // hashchange plugin
    $(window).hashchange(function(){
        var hash = $.param.fragment();
        if(hash.search('GET') == 0){
            if(path.search('admin/User') > 0){
                get_konsumen()
            }
        }else if(hash.search('DETAIL') == 0){
            if(path.search('admin/User')> 0 ){
                var user_ID = getUrlVars()["id"]
                var response = getJSON('http://'+host+path+'/action/GET',{id: user_ID})
                var user_detail = response.data
                var post_count  = response.post_count
                let blur_phone  = user_detail.handphone
                var skill       = JSON.parse(user_detail.skill) //untuk menjadikan string ke array
                let skill_text  =''
                let photo_profil


                if(user_detail.active != '0'){
                    $('#active').addClass('bg-gradient-success')
                    $('.status-active').text('Online')
                }else{
                    $('#active').addClass('bg-gradient-secondary')
                    $('.status-active').text('Offline')
                }

                if(user_detail.images_path !=null){
                    photo_profil = user_detail.images_path
                }else{
                    photo_profil = 'default.png'
                }

                // untuk melooping skill
                for(var i=0; i<skill.length;i++){
                    skill_text += skill[i]+','
                }
                skill_text = skill_text.slice(0,-1);

                
                $('#total_post').text(post_count)
                $('#role_user').text(user_detail.role_name)
                $('#username_detail').text(user_detail.username)
                $('#email_detail').text(user_detail.email)
                $('#lokasi_detail').text(user_detail.lokasi)
                $('#nomor_detail').text('********'+blur_phone.slice('-4'))
                $('#lahir_detail').text(user_detail.tempat+', '+ moment(user_detail.tanggal_lahir,'YYYY-MM-DD').format('LL'))
                $('#skill_detail').text(skill_text)
                $('.profile-user-img').attr("src",'http://'+host+path.replace('admin/User','assets/images/cms/')+photo_profil)

                $('.modal-title').text('View User');
            }

        
            $('#paradma-modal-view').modal('show');
        }else if(hash == 'create'){
            if(path.search('admin/User')){
                $('#paradma-modal h4.modal-title').text('Create New User')
                $('#btn-create').text('Create')
                $('form#form-users').attr('action','create')
            }
            $('#paradma-modal').modal('show');
        }
    })


    $(window).trigger('hashchange');

    $('#paradma-modal').on('hide.bs.modal', function(){
        window.history.pushState(null,null,path);
        $('#paradma-modal form').find("input[type=text], input[type=hidden], input[type=password], input[type=email], textarea").val("")
        $('#paradma-modal form').find("input[type=checkbox],input[type=radio]").removeAttr('checked'); 
        $('#paradma-modal form').find("select").prop("selected", false); 
    });
    $('#paradma-modal-view').on('hide.bs.modal', function(){
        window.history.pushState(null,null,path);
    });

    if(path.search('admin')){
        get_user_list(null,null)
    }

    // SUBMIT FORM USER
    $(document).on('click', '#submit-user', function(eve) {
        eve.preventDefault()
        var payload = $('form#form-users').serialize()
        var action = $('#form-users').attr('action');
        
        console.log(payload)
        
        $.ajax('http://'+host+path+'/action/'+action,{
            dataType:'json',
            type:'POST',
            data:payload,
            timeout:10000,
            success:function(response){
                $('#paradma-modal').modal('hide')
                get_user_list(null,null)
                console.log(response)
                if(response.code == '01'){
                    Toast.fire({
                        icon: 'success',
                        title: response.message
                    })
                }else if(response.code == '03'){
                    Toast.fire({
                        icon: 'error',
                        title: response.message
                    })
                }else{
                    Toast.fire({
                        icon: 'info',
                        title: response.message
                    })
                }
            },
            error:function(xhr){
                Toast.fire({
                    icon: 'error',
                    title: 'Failure Create'
                })
            }
        })

    });
    
    $(document).on('click', 'button.randomPass', function(eve) {
        eve.preventDefault()

        var str = random_password_generate(10,5)
        $('#form-users #password').val(str)
        // $('#paradma-modal').hide()

    });
});

function get_user_list(hal_aktif,scrolltop,cari){
    if($('#user-list').length > 0){
        var no = 1;
        $.ajax('http://'+host+path+'/action/GET',{
            dataType : 'json',
            type : 'POST',
            data:{hal_aktif:hal_aktif, cari:cari},
            success:function(response){
                /***********************/
                /*    GET Response    */
                /**********************/
                $('table#user-list tbody tr').remove();
                $.each(response.record, function(index, element){
                    var images = 'default.png'
                    var status
                    var status_text
                    if(element.images_path !==null){
                        images = element.images
                    }
                    
                    if(element.active != '0'){
                         status ='success'
                         status_text = 'Online'
                    }else{
                         status ='secondary'
                         status_text = 'Offline'
                    }
                    var number = no++
                    var html = "<tr>"
                    html += "<td width='5%' align='center'>"+number+"</td>"
                    html += "<td width='30%'>"
                    html += "<ul class='list-inline'>"
                    html += "<li class='list-inline-item'>"
                    html += "<img alt='Avatar' class='table-avatar' src='http://"+host+path.replace('admin/User','assets/images/cms/')+images+"'>"
                    html += "<a style='padding-left: 20px;'>"+element.username+"</a>"
                    html += "</li>"
                    html += "</ul>"
                    html += "<td>"+element.role_name+"</td>"
                    html += "<td>"+moment(element.create_at,'YYYY-MM-DD H:i:s').format('LLL')+"</td>"
                    html += "<td align='center'><h5><span class='badge badge-pill badge-"+status+"'>"+status_text+"</span></h5></td>"
                    html += "<td width='20%' align='center'>"
                    html += "<a class='btn btn-primary btn-sm button-table' href='User#DETAIL?id="+element.id_user+"'><i class='fas fa-user-alt'></i>View</a>"
                    html += "<a class='btn btn-info btn-sm button-table' href='User#UPDATE?id="+element.id_user+"'><i class='fas fa-pencil-alt'></i>Edit</a>"
                    html += "<a class='btn btn-danger btn-sm button-table' href='User#DELETE?id="+element.id_user+"'><i class='fas fa-trash'></i>Delete</a>"
                    html += "</td>"
                    html += "</tr>"
    
                    $('table#user-list').find('tbody').append(html)

                })
            }
        })
    }
}

function getJSON(url,data){
    return JSON.parse($.ajax({
      type: 'POST',
      url : url,
      data:data,
      dataType:'json',
      global: false,
      async: false,
      success:function(msg){
        
      }
    }).responseText);
  }
  
function getUrlVars(){
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++)
    {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }
    return vars;
}

function random_password_generate(max,min){
    var passwordChars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz#@!%&()/";
    var randPwLen = Math.floor(Math.random() * (max - min + 1)) + min;
    var randPassword = Array(randPwLen).fill(passwordChars).map(function(x) { return x[Math.floor(Math.random() * x.length)] }).join('');
    return randPassword;
}