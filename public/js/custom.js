window.addEventListener('load', function() {


    if ( document.querySelector('.card') ) {

        // posts show 
        let data = document.querySelector('.data');
        let image = document.querySelector('.image');
        removeCardBody();
    
        document.querySelectorAll('.card .nav-link').forEach( navitems => {
            
            navitems.addEventListener('click', function () {
                
                if ( !navitems.classList.contains('active') ) { // not contain active class
    
                    if ( data.classList.contains('active') ) {
                        data.classList.remove('active');
                        navitems.classList.add('active');
                    } 
    
                    else if ( image.classList.contains('active') ) {
                        image.classList.remove('active');
                        navitems.classList.add('active');
    
                    } else {
                        navitems.classList.add('active');
                    }
                }
    
                if ( image.classList.contains('active') ) {
                
                    removeCardBody();
                }
                
                if ( data.classList.contains('active') ) {
                
                    removeCardImage();
                } 
            });
    
        })
    
        function removeCardBody() {
    
            document.querySelector('.card-body').style.display = 'none';        
            document.querySelector('.card-image').style.display = 'block';
        }
    
        function removeCardImage() {
    
            document.querySelector('.card-image').style.display = 'none';
            document.querySelector('.card-body').style.display = 'block';
        }
    
    }
    

    
    // profile image
    let updateBtn = document.querySelector('.update');
    let cancelBtn = document.querySelector('.cancel');
    let profileImg = document.querySelector('.edit-profile-img');
    
    updateBtn.style.display = 'none';
    cancelBtn.style.display = 'none';
    
    profileImg.addEventListener('click', (e)=> {
    
        e.preventDefault();
        profileImg.style.display = 'none';
        document.querySelector('.update').style.display = 'inline-block';
        document.querySelector('.cancel').style.display = 'inline-block';
    })
    
    cancelBtn.addEventListener('click', (e)=> {
    
        e.preventDefault();
        profileImg.style.display = 'inline-block';
        document.querySelector('.update').style.display = 'none';
        document.querySelector('.cancel').style.display = 'none';
    })

    if (!document.querySelector('textarea')) {
        document.querySelector('textarea').addEventListener('click', ()=> CKEDITOR.replace('textarea-ckeditor'));
    }

    if (!document.querySelector('.delete-post')) {
        document.querySelector('.delete-post').addEventListener('click', (e)=> confirm('Are you sure to delete ?') ? '' : e.preventDefault());
    
    }

})