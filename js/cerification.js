function verif(){
                var pass =  window.document.getElementById('passe').value;
                var conf_pass  =    window.document.getElementById('cpasse').value;
                if (pass==conf_pass)
                {

                    return true;
                }
                else{
                    return false;}
}
