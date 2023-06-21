<?php

namespace app\site\entities;

class Livro {
    private $id;
    private $titulo;
    private $slug;
    private $sinopse;
    private $thumb;
    private $status;
    private $qtde;
    private $generoId;
    private $genero;
    private $autorId;
    private $autor;
    private $editoraId;
    private $editora;

    public function setId($id) {
        $this->id = $id;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function setSlug($slug) {
        $this->slug = $slug;
    }

    public function setSinopse($sinopse) {
        $this->sinopse = $sinopse;
    }

    public function setThumb($thumb) {
        $this->thumb = $thumb;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function setQtde($qtde) {
        $this->qtde = $qtde;
    }

    public function setGeneroId($generoId){
        $this->generoId = $generoId;
    }

    public function setGenero($genero){
        $this->genero = $genero;
    }

    public function setAutorId($autorId){
        $this->autorId = $autorId;
    }

    public function setAutor($autor){
        $this->autor = $autor;
    }

    public function setEditoraId($editoraId){
        $this->editoraId = $editoraId;
    }

    public function setEditora($editora){
        $this->editora = $editora;
    }

    public function getId(){
        return $this->id;
    }

    public function getTitulo(){
        return $this->titulo;
    }

    public function getSlug(){
        return $this->slug;
    }

    public function getSinopse(){
        return $this->sinopse;
    }

    public function getThumb(){
        return $this->thumb;
    }

    public function getStatus(){
        return $this->status;
    }

    public function getQtde(){
        return $this->qtde;
    }

    public function getGeneroId(){
        return $this->generoId;
    }

    public function getGenero(){
        return $this->genero;
    }

    public function getAutorId(){
        return $this->autorId;
    }

    public function getAutor(){
        return $this->autor;
    }

    public function getEditoraId(){
        return $this->editoraId;
    }

    public function getEditora(){
        return $this->editora;
    }
}

