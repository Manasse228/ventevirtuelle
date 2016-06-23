 window.onload = function(){
            document.getElementById('onglets').style.display = 'block';
            document.getElementById('onglets').onclick = function(e){
                var actuel = e ? e.target : window.event.srcElement;
                if (!/li/i.test(actuel.nodeName) || actuel.className.indexOf('actif') > -1) {
                    return;
                }
                var allOnglets = document.getElementById('onglets').getElementsByTagName('li'),
                    i = allOnglets.length;
                while(i--){
                    if(allOnglets[i] == actuel){
                        allOnglets[i].className += ' actif';
                    }
                    else{
                        allOnglets[i].className = allOnglets[i].className.replace('actif', '');
                        if(String.trim){
                            allOnglets[i].className.trim();
                        }
                    }
                }
                setDisplay();
            }
            setDisplay();
        }
        function setDisplay(){
            var allOnglets = document.getElementById('onglets').getElementsByTagName('li'),
                allContenus = document.getElementById('contenu').getElementsByTagName('div'),
                i = allOnglets.length;
            while(i--){
                if(allOnglets[i].className.indexOf('actif') == -1){
                    allContenus[i].style.display = 'none';
                }
                else{
                    allContenus[i].style.display = 'block';
                }
            }
        }