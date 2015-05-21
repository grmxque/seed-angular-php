function loginService(Restangular) {
    return {

        initiate : function(user){
            return Restangular.all('login').customPOST(user);
        }

    }
}