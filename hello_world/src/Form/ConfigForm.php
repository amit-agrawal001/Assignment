<?php  

/**  
 * @file  
 * Contains Drupal\helloworld\Form\ConfigForm.  
 */ 

namespace Drupal\hello_world\Form;  

use Drupal\Core\Form\ConfigFormBase;  
use Drupal\Core\Form\FormStateInterface;
use Drupal\hello_world\Services\DateTime;  
  
class ConfigForm extends ConfigFormBase { 
  

  

    protected function getEditableConfigNames() {  
        return [  
          'welcome.adminsettings',  
        ];  
      }  

    public function getFormId() {  
        return 'welcome_form';  
      } 
      
    public function buildForm(array $form, FormStateInterface $form_state) {  
        $config = $this->config('welcome.adminsettings');  
      
        $form['country'] = [  
          '#type' => 'textfield',  
          '#title' => $this->t('Country'),  
          '#description' => $this->t('Choose your country.'),    
          
        ];  

        $form['city'] = [
          '#type' => 'textfield',
          '#title' => $this->t('City'),
        ];

        $form['Timezone'] = [
           '#type' => 'select',
           '#title' => $this->t('Timezone'),
           '#options' => [
               'us' => 'America/Chicago',
               'usa' => 'America/New_York',
               'Japan' => 'Asia/Tokyo',
               'Dubai' => 'Asia/Dubai',
               'India' => 'Asia/Kolkata',
               'Netherlands' => 'Europe/Amsterdam',
               'Europe' => 'Europe/Oslo',
               'uk' => 'Europe/London',
           ] 
        ];
          
      
        return parent::buildForm($form, $form_state);  
      } 
      
      

    public function submitForm(array &$form, FormStateInterface $form_state) {  
        parent::submitForm($form, $form_state);  
      
        $this->config('welcome.adminsettings') 
        ->set('country', $form_state->getValue('country')) 
        ->set('city', $form_state->getValue('city'))
        ->set('Timezone', $form_state->getValue('Timezone'))
          ->save();  
         
          $timezone = $form_state->getValue('Timezone');
         $service = \Drupal::service('hello_world.custom_services')->gettime($timezone);
          dump($service);
          die();
          
      }   

      
   
      
}  