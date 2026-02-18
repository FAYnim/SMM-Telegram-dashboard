export const CookieManager = {
    set: function (name, value, days) {
        let expires = "";
        if(days) {
            let date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toUTCString();
        }

        document.cookie = name + "=" + (value || "") + expires + "; path=/";
    },

    get: function (name) {
        let nameEQ = name + "=";
        let ca = document.cookie.split(';');
        for(let i = 0; i < ca.length; i++) {
            let c  = ca[i];
            while(c.charAt(0) == ' ') c = c.substring(1, c.length);
            if(c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
        }
        return null;
    },

    erase: function (name) {
        document.cookie = name + "=; Max-Age=-999999999";
    },
}

/**
 * CookieManager Usage Examples
 * 
 * Get cookie:
 *   const userLogin = CookieManager.get("login");
 * 
 * Set cookie:
 *   CookieManager.set("login", "true", 7);
 * 
 * Erase cookie:
 *   CookieManager.erase("login");
 */