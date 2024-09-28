<?php
require_once ('../Controllers/getNewsController.php');
class modifyNews
{
    public function modify($id){
        $gnc=new getNewsController();
        $result=$gnc->get($id);
?>
            <head>
                <script src="../jQuery/jquery-3.6.0.js"></script>
                <script>

                    function modify(id){
                        let arr=[];
                        let v1=document.getElementById('titre').innerText;
                        let v2=document.getElementById('image').innerText;
                        let v3=document.getElementById('description').innerText;
                        let v4=document.getElementById('video').innerText;

                        $.ajax({
                            url:"../Controllers/ajaxModifyNews.php",
                            type:"GET",
                            data: {
                                id:id,
                                v1:v1,
                                v2:v2,
                                v3:v3,
                                v4,v4,
                            },
                            cache:false,
                            success: function (dataResult){
                                alert(dataResult);
                                alert('Les etapes ont bien ete modifiees');
                            }
                        })
                    }
                </script>
            </head>
        <div id="test">
        <h2 id="titre" contenteditable="true" class='mt-1'><?php echo $result[0]?></h2>
        <br>
        <center>
            <img style='width: 600px;height: 400px' src='<?php echo $result[2]?>'>
            <div>image source:<label id="image" contenteditable="true"> <?php echo $result[2]?></label></div>
        </center>
        <br>
        <div id="description" contenteditable="true" style="font-family: 'Times New Roman'; font-size: 18px;margin-left: 200px;margin-right: 200px;"><?php echo $result[1]?></div>
        <?php if ($result[3]!=null) {?>
            <center>
                <video  height="500" width="650" controls>
                    <source src="<?php echo $result[3]?>" type="video/mp4">
                </video>
            </center>

        <?php } ?>
        <center><div>video source: <label id="video" contenteditable="true"><?php echo $result[3]?></label></div></center>
            <br>
        <br>
        <center><button style="margin-bottom: 30px;" class="btn btn-primary" onclick="modify(<?php echo $result[4]?>)">Modifier</button></center>
        </div>
        <?php
}

}