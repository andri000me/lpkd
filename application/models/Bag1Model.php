    <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Bag1Model extends CI_Model {
        public function viewByProvinsi($idbagian){
            $this->db->where('idBagian', $idBagian);

                $result = $this->db->get('tbbagian1')->result(); // Tampilkan semua data kota berdasarkan id provinsi
                        return $result;
            }
        }