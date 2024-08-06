CREATE TABLE tx_tags_domain_model_tag (
    KEY name (name)
);

CREATE TABLE tx_tags_domain_model_tag_mm (
    table_name VARCHAR(64) DEFAULT '' NOT NULL,
    field_name VARCHAR(64) DEFAULT '' NOT NULL,

    KEY relation_foreign (table_name, uid_foreign),
    KEY relation_local (table_name, uid_local)
);