<?php

namespace Drupal\no_google_ads_ad_network\Form;

use Drupal\Component\Utility\NestedArray;
use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Drupal\Core\Entity\EntityFieldManagerInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\field\Entity\FieldConfig;
use Drupal\field\Entity\FieldStorageConfig;
use Drupal\node\Entity\NodeType;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Settings form for the attached `No google ads ad network` script.
 */
class NoGoogleAdsAdNetworkSettingsFormAdNetworkSettingsForm extends ConfigFormBase implements ContainerInjectionInterface {

  /**
   * The entity type manager service.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * The entity field manager.
   *
   * @var \Drupal\Core\Entity\EntityFieldManagerInterface
   */
  protected $entityFieldManager;

  /**
   * NoGoogleAdsAdNetworkSettingsFormAdNetworkSettingsForm constructor.
   *
   * @param \Drupal\Core\Config\ConfigFactoryInterface $config_factory
   *   The config factory.
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   *   The entity type manager.
   * @param \Drupal\Core\Entity\EntityFieldManagerInterface $entity_field_manager
   *   The entity field manager.
   */
  public function __construct(ConfigFactoryInterface $config_factory, EntityTypeManagerInterface $entity_type_manager, EntityFieldManagerInterface $entity_field_manager) {
    parent::__construct($config_factory);
    $this->entityTypeManager = $entity_type_manager;
    $this->entityFieldManager = $entity_field_manager;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('config.factory'),
      $container->get('entity_type.manager'),
      $container->get('entity_field.manager')
    );
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'no_google_ads_ad_network.settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'no_google_ads_ad_network_settings';
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    $content_type = $form_state->getValue('content_type');
    foreach($content_type as $type) {
      $content_type_applicable_fields = $this->getApplicableFields('node', $type);
    }
    if (empty($content_type_applicable_fields) || NestedArray::keyExists($content_type_applicable_fields, ['none'])) {
      $form_state->setErrorByName('content_type', $this->t('Content type must contain fields of the boolean (True/False) type.'));
    }

    $taxonomy_term = $form_state->getValue('taxonomy_term');
    $taxonomy_term_applicable_fields = $this->getApplicableFields('taxonomy_term', NULL, $taxonomy_term);

    if (empty($taxonomy_term_applicable_fields) || NestedArray::keyExists($taxonomy_term_applicable_fields, ['none'])) {
      $form_state->setErrorByName('taxonomy_term', $this->t('Taxonomy term must contain fields of the boolean (True/False) type.'));
    }

  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form = parent::buildForm($form, $form_state);
    $config = $this->config('no_google_ads_ad_network.settings');

    // Get selected content type.
    $content_type_from_user_input = NestedArray::getValue($form_state->getUserInput(), ['content_type']);
    $taxonomy_term_from_user_input = NestedArray::getValue($form_state->getUserInput(), ['taxonomy_term']);

    // Get content type from user input or load from config.
    $node_bundle = $content_type_from_user_input ? $content_type_from_user_input : $config->get('content_type');

    $content_types = $this->getEntityBundles('node_type');

    // Filtering of the CTs, allow only CTs with special field.
    foreach ($content_types as $bundle => $name) {
      $fields = $this->getApplicableFields('node', $bundle);
      if (isset($fields['none'])) {
        unset($content_types[$bundle]);
      }
    }

    $form['content_type'] = [
      '#type' => 'select',
      '#title' => 'Content type',
      '#default_value' => $config->get('content_type'),
      '#options' => $content_types,
      '#description' => $this->t('Select the content type to which must attach the `No google ads ad script` .'),
      '#required' => TRUE,
      '#multiple' => TRUE,
      '#ajax' => [
        'event' => 'change',
        'callback' => [$this, 'ajaxRebuildForm'],
        'wrapper' => 'control-field-content-type',
      ],
    ];

    $form['control_field_content_type'] = [
      '#type' => 'select',
      '#title' => 'Control field content type',
      '#default_value' => $config->get('control_field_content_type'),
      '#options' => $this->getApplicableFields('node', $node_bundle),
      '#description' => $this->t('Select the field to control the behavior of the script.'),
      '#multiple' => TRUE,
      '#validated' => TRUE,
      '#prefix' => '<div id="control-field-content-type">',
      '#suffix' => '</div>',
    ];

      $taxonomy_term = $taxonomy_term_from_user_input ? $taxonomy_term_from_user_input : $config->get('taxonomy_term');

      $form['taxonomy_term'] = [
        '#type' => 'select',
        '#title' => 'Taxonomy term',
        '#default_value' => $config->get('taxonomy_term'),
        '#options' => $this->getEntityBundles('taxonomy_vocabulary'),
        '#description' => $this->t('Select the taxonomy term to which must attach the `No google ads ad script` .'),
        '#required' => TRUE,
        '#ajax' => [
          'event' => 'change',
          'callback' => [$this, 'ajaxRebuildForm'],
          'wrapper' => 'control-field-taxonomy-term',
        ],
      ];

      $form['control_field_taxonomy_term'] = [
        '#type' => 'select',
        '#title' => 'Control field taxonomy term',
        '#default_value' => $config->get('control_field_taxonomy_term'),
        '#description' => $this->t('Select the field to control the behavior of the script.'),
        '#required' => TRUE,
        '#validated' => TRUE,
        '#options' => $this->getApplicableFields('taxonomy_term', $taxonomy_term),
        '#prefix' => '<div id="control-field-taxonomy-term">',
        '#suffix' => '</div>',
      ];

      $form['path'] = [
        '#type' => 'textfield',
        '#title' => $this->t('Path'),
        '#description' => $this->t('Select path to which must attach the `No google ads ad script`. An example path is /user/login'),
        '#default_value' => $config->get('path'),
      ];

    return $form;

  }

  /**
   * Rebuild form after change content type.
   */
  public function ajaxRebuildForm(array &$form, FormStateInterface $form_state) {
    $form_state->setRebuild();
    $triggered_element = $form_state->getTriggeringElement();
    $name = NestedArray::getValue($triggered_element, ['#name']);
    $type = NestedArray::getValue($triggered_element, ['#title']);

    $wrapper = 'control_field_' . $name;
    $fields = [];

    if ($type == 'Content type') {
      $contents = NestedArray::getValue($triggered_element, ['#value']);
      foreach ($contents as $node_bundle) {
        $fields = array_merge($fields, $this->getApplicableFields('node', $node_bundle));
        $form[$wrapper]['#options'] = $fields;
      }
    } elseif ($type == 'Taxonomy term'){
      $vocabulary = NestedArray::getValue($triggered_element, ['#value']);
      $terms = array_merge($fields, $this->getApplicableFields($name,NULL ,$vocabulary));
      $form[$wrapper]['#options'] = $terms;
    }

    return $form[$wrapper];
  }

  /**
   * Get applicable fields by content type.
   *
   * @param string $entity_type_id
   *   The entity type id.
   * @param string $bundle
   *   The content type for retrieve fields.
   *
   * @return array
   *   The an array of the applicable fields.
   */
  protected function getApplicableFields($entity_type_id, $bundle = NULL, $vocabulary = NULL) {

    if (empty($entity_type_id)) {
      return [
        'none' => '- None -',
      ];
    }

    $options = [];

    if (!empty($bundle)) {
      $fields = $this->entityFieldManager->getFieldDefinitions($entity_type_id, $bundle);
    }
    else {
    //  $fields = $this->entityFieldManager->getFieldStorageDefinitions($entity_type_id);
      $terms = \Drupal::entityTypeManager()->getStorage($entity_type_id)->loadTree($vocabulary);

      foreach ($terms as $term) {
        $term_data[] = $term->name;
      }
      if (empty($term_data)) {
        return [
          'none' => '- None -',
        ];
      }
      return $term_data;

    }

    foreach ($fields as $field_name => $field_definition) {
      // Only add fields with type `boolean`.
      if ((($field_definition instanceof FieldConfig) || ($field_definition instanceof FieldStorageConfig))  && $field_definition->getType() == 'boolean') {
        $options[$field_name] = $this->t($field_definition->getLabel());
      }
    }

    if (empty($options)) {
      return [
        'none' => '- None -',
      ];
    }
    return $options;

  }

  /**
   * Get entity bundles.
   *
   * @param string $entity_type_id
   *   The entity type id.
   *
   * @return array
   *   An array of the options
   *
   * @throws \Drupal\Component\Plugin\Exception\InvalidPluginDefinitionException
   * @throws \Drupal\Component\Plugin\Exception\PluginNotFoundException
   */
  protected function getEntityBundles($entity_type_id) {
    $options = [];

    $entity_bundles = $this->entityTypeManager->getStorage($entity_type_id)->loadMultiple();

    if (empty($entity_bundles)) {
      return $options;
    }

    $allowed_bundles = array_filter($entity_bundles, function ($bundle) use ($entity_type_id) {
      $type = $bundle instanceof NodeType ? 'node' : 'taxonomy_term';
      return $this->getApplicableFields($type, $bundle->get('type')) ? TRUE : FALSE;
    });

    foreach ($allowed_bundles as $bundle => $info) {
      $options[$bundle] = $this->t($info->get('name'));
    }

    return $options;

  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $values = $form_state->getValues();
    $config = $this->config('no_google_ads_ad_network.settings');

    if (NestedArray::getValue($values, ['content_type'])) {
      $config->set('content_type'. $values['content_type'], $values['content_type'])
        ->set('control_field_node', $values['control_field_content_type']);
    }

    if (NestedArray::getValue($values, ['taxonomy_term'])) {
      $config->set('taxonomy_term', $values['taxonomy_term'])
        ->set('control_field_taxonomy_term', $values['control_field_taxonomy_term']);
    }

    if (NestedArray::getValue($values, ['path'])) {
      $config->set('path', $values['path']);
    }

    $config->save();

    parent::submitForm($form, $form_state);
  }

}
