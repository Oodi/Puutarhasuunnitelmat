<div class="panel panel-default">
    <div class="panel-body">
        <form class="form-horizontal" method="POST">

            <div class="form-group">
                <label class="col-sm-2 form-label" for="textinput">Kasvin nimi:</label>
                <div class="col-sm-3">
                    <input id="textinput" name="nimi" placeholder="" class="form-control" type="text">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 form-label" for="textinput">Kuvaus:</label>
                <div class="col-sm-3">
                    <textarea id="kuvaus" name="kuvaus" rows="3"></textarea>
                </div>
            </div>

            <div class="form-group">

                <label class="col-sm-2 form-label">Valoisuus:</label>
                <div class="btn-group" data-toggle="buttons">
                    <label class="btn btn-primary">
                        <input type="checkbox" name="valoisuus[]" value="1"  id="option"> Aurinko
                    </label>
                    <label class="btn btn-primary">
                        <input type="checkbox" name="valoisuus[]" value="2"  id="option"> Puolivarjo
                    </label>
                    <label class="btn btn-primary">
                        <input type="checkbox" name="valoisuus[]" value="3" id="option"> Varjo
                    </label>
                </div>

            </div>
            <div class="form-group">

                <label class="col-sm-2 form-label">Kasvuvyöhyke:</label>
                <div class="btn-group" data-toggle="buttons">
                    <label class="btn btn-primary">
                        <input type="radio" name="vyohyke" value="1" id="option7"> I a
                    </label>
                    <label class="btn btn-primary">
                        <input type="radio" name="vyohyke" value="2"  id="option7"> I b
                    </label>
                    <label class="btn btn-primary">
                        <input type="radio" name="vyohyke" value="3"  id="option8"> II
                    </label>
                    <label class="btn btn-primary">
                        <input type="radio" name="vyohyke" value="4"  id="option8"> III
                    </label>
                    <label class="btn btn-primary">
                        <input type="radio" name="vyohyke" value="5"  id="option8"> IV
                    </label>
                    <label class="btn btn-primary">
                        <input type="radio" name="vyohyke" value="6"  id="option8"> V
                    </label>
                    <label class="btn btn-primary">
                        <input type="radio" name="vyohyke" value="7"  id="option8"> VI
                    </label>
                    <label class="btn btn-primary">
                        <input type="radio" name="vyohyke" value="8"  id="option8"> VII
                    </label>
                    <label class="btn btn-primary">
                        <input type="radio" name="vyohyke" value="9"  id="option8"> VIII
                    </label>

                </div>

            </div>
            <div class="form-group">

                <label class="col-sm-2 form-label">Tunnelma:</label>
                <div class="btn-toolbar" id="testi" data-toggle="buttons">


                    <label class="btn btn-primary">
                        <input type="checkbox" name="tunnelma[]" value="romanttinen" id="option7"> Romanttinen
                    </label>
                    <label class="btn btn-primary">
                        <input type="checkbox" name="tunnelma[]" value="japanilainen" id="option7"> Japanilainen
                    </label>
                    <label class="btn btn-primary">
                        <input type="checkbox" name="tunnelma[]" value="luonnollinen" id="option8"> Luonnollinen
                    </label>

                    <label class="btn btn-primary">
                        <input type="checkbox" name="tunnelma[]" value="graafinen" id="option8"> Graafinen
                    </label>
                    <label class="btn btn-primary">
                        <input type="checkbox" name="tunnelma[]" value="kivikkoinen" id="option8"> Kivikkoinen
                    </label>
                    <label class="btn btn-primary">
                        <input type="checkbox" name="tunnelma[]" value="tunnelma" id="option8"> Hyötypuutarha
                    </label>
                </div>


            </div>
            <div class="form-group">
                <div class="col-md-3 col-md-offset-1"><button type="submit" id="lisaa" class="btn btn-success btn-lg">Lisää kasvi</button> </div>
            </div>
        </form>
    </div>
</div>