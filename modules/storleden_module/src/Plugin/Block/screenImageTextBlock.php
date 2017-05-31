<?php
namespace Drupal\storleden_module\Plugin\Block;

use Drupal\Core\Block\BlockBase; 
 use Drupal\Core\Form\FormBuilderInterface; 
 use Drupal\Core\Form\FormStateInterface;
 use Drupal\Core\File\File;


#use Drupal\Core\Entity\Query\QueryInterface
/**
 *
 * @Block(
 *   id = "screenimagetextblocks",
 *   admin_label = @Translation("Screen Image Text Block"),
 *   category = @Translation("Storleden")
 * )
 */
class screenImageTextBlock extends BlockBase {
  
  /**
   * On block call and build
   *
   * @return string
   */
  public function build() {
      $config = $this->getConfiguration();


      if (isset($config['screen_text_title']) && !empty($config['screen_text_title'])) {
          $textTitle = $config['screen_text_title'];
      }
      else {
        $textTitle = $this->t('');
      }



     if (isset($config['screen_text']) && !empty($config['screen_text'])) {
          $text = $config['screen_text'];
      }
      else {
        $text = $this->t('');
      }
      // fetch photo

       $imageid = $config['photo'];
      

      if (isset($imageid) && !empty($imageid)) {
          $file = \Drupal\file\Entity\File::load($imageid[0]);
          if ($file != null) {
            $imgurl = file_create_url($file->getFileUri());
          }
          else{
            $imgurl='any.jpg';
          } 
            
          
          
      }
      else {
        $imgurl = 'any.jpg';
      }
      


    return array(
            '#theme' => 'screen_image_text',            
            '#node' => [
                          'screenTextTitle' => $textTitle ,
                          'screenText' => $text ,
                          'imgurl' => $imgurl ,
            ],
            '#attached' => array(
        'library' => array(
          'storleden_module/storleden_lib',
        ),
      ), 
        );
  }


  
  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form = parent::blockForm($form, $form_state);

    $config = $this->getConfiguration();

    $form['screen_text_title'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Screen Text Title'),
      '#description' => $this->t('First line as a title for the midile text '),
      '#default_value' => isset($config['screen_text_title']) ? $config['screen_text_title'] : '',
    );
    $form['screen_text'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Screen Text'),
      '#description' => $this->t('Type the text that you want in the midile'),
      '#default_value' => isset($config['screen_text']) ? $config['screen_text'] : '',
    );
    // upload imag

    $form['photo'] = array(
      '#title' => t('Local Computer Image'),
      '#type' => 'managed_file',
      '#description' => t('The uploaded image will be displayed on this page using the image style chosen below.'),
      '#default_value' => isset($config['photo']) ? $config['photo'] : '',
      '#upload_location' => 'public://images/',
      '#required' => FALSE,
      '#theme'    =>    'advphoto_thumb_upload',
    );







    // end img
  

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    parent::blockSubmit($form, $form_state);
    $values = $form_state->getValues();
    $this->configuration['screen_text_title'] = $values['screen_text_title'];
    $this->configuration['screen_text'] = $values['screen_text'];
    $this->setConfigurationValue('photo', $form_state->getValue('photo'));
  }


}