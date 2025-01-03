function loadinggg(val){
    if(val){
        loadinggg(false)
        document.querySelector('body').classList.add('snipContainerLoading');
        document.querySelector('.loadingAnimationContainer').style.display='flex'
    }else if(val==false){
        console.log('bbbb')
        document.querySelector('body').classList.remove('snipContainerLoading');
        document.querySelector('.loadingAnimationContainer').style.display='none'
    }
    
}

