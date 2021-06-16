package ffos.p3.ontologija;

import java.io.Serializable;

public class Ontologija implements Serializable {

    public Ontologija() {
        this.sifra = sifra;
        this.drzava = drzava;
        this.glumac = glumac;
       // this.godina = godina;
        this.nagrada = nagrada;
        this.heroj = heroj;
    }

    private String glumac;
    private String drzava;
    //private int godina;
    private String nagrada;
    private String heroj;

    private int sifra;

    public int getSifra() {
        return sifra;
    }

    public String getGlumac() {
        return glumac;
    }

    public void setGlumac(String glumac) {
        this.glumac = glumac;
    }

    public String getDrzava() {
        return drzava;
    }

    public void setDrzava(String drzava) {
        this.drzava = drzava;
    }

    //public int getGodina() {
        //return godina;
        //}

    //public void setGodina(int godina) {
        //    this.godina = godina;
    //}

    public String getNagrada() {
        return nagrada;
    }

    public void setNagrada(String nagrada) {
        this.nagrada = nagrada;
    }

    public String getHeroj() {
        return heroj;
    }

    public void setHeroj(String heroj) {
        this.heroj = heroj;
    }

    public void setSifra(int sifra) {
        this.sifra = sifra;
    }
}
