
        @extends('layouts.master')
        @section('content')

            <h1>Recherche un séjour sur un critère </h1>
            <form method="POST" action="{{url('postrechercheMoisSejour')}}" >

                <div class="form-group">
                    <label for="DateDebSej">Mois :</label>
                    <select name="DateDebSej" id="DateDebSej" class="form-control">
                        <option value="1">Janvier</option>
                        <option value="2">Février</option>
                        <option value="3">Mars</option>
                        <option value="4">Avril</option>
                        <option value="5">Mai</option>
                        <option value="6">Juin</option>
                        <option value="7">Juillet</option>
                        <option value="8">Août</option>
                        <option value="9">Septembre</option>
                        <option value="10">Octobre</option>
                        <option value="11">Novembre</option>
                        <option value="12">Décembre</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="DateDebSej">Année :</label>
                    <select name="DateDebSej" id="DateDebSej" class="form-control">
                            <option value="1">2000</option>
                            <option value="2">2001</option>
                            <option value="3">2002</option>
                            <option value="4">2003</option>
                            <option value="5">2004</option>
                            <option value="6">2005</option>
                            <option value="7">2006</option>
                            <option value="8">2007</option>
                            <option value="9">2008</option>
                            <option value="10">2009</option>
                            <option value="11">2010</option>
                            <option value="12">2011</option>
                            <option value="13">2012</option>
                            <option value="14">2013</option>
                            <option value="15">2014</option>
                            <option value="16">2015</option>
                            <option value="17">2016</option>
                            <option value="18">2017</option>
                        </select>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Valider</button>
                    <a href="{{ url('/') }}" class="btn btn-default">Annuler</a>
                </div>
            </form>
        @endsection



