function loginService(Restangular) {
    return {

        initiate : function(user){
            return Restangular.all('signIn').customPOST(user);
        }

    }
}