<?php

class Targaryen {
    public function resistsFire() {
        return False;
    }
    public function getBurned() {
        if (method_exists($this, 'resistsFire') && $this->resistsFire() == true) {
            return "emerges naked but unharmed";
        }
        else {
            return "burns alive";
        }
    }
}
?>