var path = window.location.pathname;
var host = window.location.hostname;

var delay = (function(){
    var timer = 0;
    return function(callback, ms){
      clearTimeout(timer);
      timer = setTimeout(callback,ms);
    };
  })();
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

    const pemilihanSwal = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-danger',
          cancelButton: 'btn btn-success'
        },
        buttonsStyling: false
    })

    // hashchange plugin
    $(window).hashchange(function(){
        var hash = $.param.fragment();
        if(hash.search('GET') == 0){
            if(path.search('admin/User') > 0){
                get_konsumen()
            }
        }else if(hash.search('UPDATE') == 0){
            if(path.search('admin/User')> 0 ){
                var user_ID = getUrlVars()["id"]
                var response = getJSON('http://'+host+path+'/action/GET',{id: user_ID})

                $('form#form-users').attr('action','update')


                let data    = response.data
                var skill    = JSON.parse(data.skill)
                let skill_text =''

                for(var i=0; i<skill.length;i++){
                    skill_text += skill[i]+','
                }
                 skill_text = skill_text.slice(0,-1);
                // data tbl_user
                $('#form-users #ID').val(data.id_user)
                $('#form-users #username').val(data.username)
                $('#form-users #username').prop('readonly',true)

                $('#form-users #email').val(data.email)
                $("#form-users #role").select2().select2('val',data.role);

                // data tbl_user_detail
                $('#form-users #nama_depan').val(data.nama_depan)
                $('#form-users #nama_belakang').val(data.nama_belakang)
                $('#form-users #tempat').val(data.tempat)
                $('#form-users #phone').val(data.handphone)
                $('#form-users #tanggal_lahir').val(moment(data.tanggal_lahir,'YYYY-MM-DD').format('DD-MM-YYYY'))
                $('#form-users #lokasi').val(data.lokasi)
                $('#form-users #skill').val(skill_text)


            }
            
            $('#paradma-modal').modal('show')
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
            if(path.search('admin/User')>0){
                $('#paradma-modal h4.modal-title').text('Create New User')
                $('#btn-create').text('Create')
                $('form#form-users').attr('action','create')
            }
            $('#paradma-modal').modal('show');
        }else if(hash.search('DELETE') == 0){
            if(path.search('admin/User')>0){
                pemilihanSwal.fire({
                    title: 'Yakin Akan Dihapus Permanen',
                    text: "Kamu bisa hapus data sementara loh",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Hapus Permanen!',
                    cancelButtonText: 'Tidak, sementara saja!',
                    reverseButtons: true
                  }).then((result) => {
                    var user_ID = getUrlVars()["id"]

                    if (result.value) {
                        window.history.pushState(null,null,path);
                        console.log('permanent')
                        let payload ={
                            'type':'hard',
                            'id':user_ID
                        }
                        $.ajax('http://'+host+path+'/action/delete',{
                            type : 'POST',
                            data : payload,
                            dataType:'json',
                            success:function(response){
                                pemilihanSwal.fire(
                                    'Deleted Permanent!',
                                     response.message,
                                    'success'
                                )
                                get_user_list(null)

                            },
                            error:function(){
                                pemilihanSwal.fire(
                                    'Failuer!',
                                    'Deleted Fail',
                                    'error'
                                )
                                get_user_list(null)

                            }
                        })
                        
                    } else if (
                      /* Read more about handling dismissals below */
                      result.dismiss === Swal.DismissReason.cancel
                    ) {
                        window.history.pushState(null,null,path);
                        console.log('sementara')
                        let payload ={
                            'type':'soft',
                            'id':user_ID
                        }
                        $.ajax('http://'+host+path+'/action/delete',{
                            type : 'POST',
                            data : payload,
                            dataType:'json',
                            success:function(response){
                                pemilihanSwal.fire(
                                    'Soft Deleted!',
                                    response.message,
                                    'success'
                                )
                                get_user_list(null)
                            },
                            error:function(){
                                pemilihanSwal.fire(
                                    'Failuer!',
                                    'Deleted Fail',
                                    'error'
                                )
                                get_user_list(null)

                            }
                        })
                        
                    }else if (Swal.DismissReason.backdrop){
                        window.history.pushState(null,null,path);

                    }
                  })
            }
        }else if(hash.search('search') == 0){
            if(path.search('admin/User')>0){
                let hal_aktif = null;
                let filter = null
                let search = null
                var hash = getUrlVars()

                
                if(hash['filter']){
                    console.log('filter')
                    filter = hash['filter'];
                }else if(hash['hal'] && hash['keyword']){
                    console.log('keyword dan halaman')
                    search = hash['keyword'];
                    hal_aktif = hash['hal']
                }else if(hash['hal']){
                    console.log('halaman')
                    hal_aktif = hash['hal']
                }
                
                console.log(hal_aktif)
                console.log(filter)
                console.log(search)
                get_user_list(hal_aktif,filter,search)
                $("ul#pagination-user li a:contains('"+hal_aktif+"')").parents().addClass('active').siblings().removeClass('active');  
                
            }
        }
    })


    $(window).trigger('hashchange');

    $('#paradma-modal').on('hide.bs.modal', function(){
        window.history.pushState(null,null,path);
        $('#paradma-modal form').find("input[type=text], input[type=hidden], input[type=password], input[type=email], textarea").val("")
        $('#paradma-modal form').find("input[type=checkbox],input[type=radio]").removeAttr('checked');

        $('#form-users #username').prop('readonly',false)

    });
    $('#paradma-modal-view').on('hide.bs.modal', function(){
        window.history.pushState(null,null,path);
    });

    if(path.search('admin')){
        get_user_list(1,null,null)
    }
    
    if(path.search('create')){
        $('#post_book_area').summernote({
            height: 300,
            disableGrammar: false
        });
        
        $('.add_category').hide()
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
                get_user_list(null,null,null)
                console.log(response)
                if(response.code == '01'){
                    Toast.fire({
                        icon: 'success',
                        title: response.message
                    })
                }else if(response.code == '02'){
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
            error:function(){
                get_user_list(null,null,null)
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

    });

    // show element class add_category
    var isShow = false
    $(document).on('click', '#btn-add_category', function(eve) {
        eve.preventDefault()
        console.log(!isShow)
        if(!isShow){
            $('.add_category').show()
            isShow = true
        }else{
            $('.add_category').hide()
            isShow = false
        }

    });
    

    $(document).on('keyup','#search', function(){
        delay(function(){
          var searchkey = $('#search').val();
          
          if(searchkey.length == 0){
            window.history.pushState(null,null,path);
            get_user_list(1,null,null)
          }else{
            window.location.hash = "#search?hal=1&keyword="+searchkey;
          }
          
        }, 1000);

      });
});

function get_user_list(hal_aktif,filter,cari){
    // console.log('hal aktif',{hal_aktif:hal_aktif})
    // console.log('filter',{filter:filter})
    // console.log('cari',{cari:cari})

    if($('#user-list').length > 0){
        var no = 1;
        $.ajax('http://'+host+path+'/action/GET',{
            dataType : 'json',
            type : 'POST',
            data:{hal_aktif:hal_aktif, cari:cari, filter:filter},
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
            
                    /*  PAGINATION  */
                    var pagination  = ''
                    var page        = Math.ceil(response.total_row / response.perpage)

                    console.log(page)
                    
                    if(($('ul#pagination-user li').length == 0) && (hal_aktif)){
                        console.log('masuk pagination kosongan')
                        // menghapus element remove
                        $('#pagination-user li').remove();

                        for(var i=1; i <= page ; i++){
                            pagination = pagination + '<li class="page-item"><a class="page-link" href="User#search?hal='+i+'">'+i+'</a></li>'
                            
                        }
                    }else if(cari && hal_aktif){
                        console.log('jika ada yang dicari')
                        // menghapus element remove
                        $('#pagination-user li').remove();

                        for(var i=1; i <= page ; i++){
                            pagination = pagination + '<li class="page-item"><a class="page-link" href="User#search?hal='+i+'&keyword='+cari+'">'+i+'</a></li>'
                            
                        }
                    }else{
                        $('#pagination-user li').remove();
                    }

                    // masukan var pagination kedalam element
                    $('ul#pagination-user').append(pagination);
                    $("ul#pagination-user li:contains('"+hal_aktif+"')").addClass('active');

                    
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
      success:function(){
        
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