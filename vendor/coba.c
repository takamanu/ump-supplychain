#include <stdio.h>
#include <stdlib.h>

struct node {
    int data;
    struct node *next;
};

int main() {
    struct node *head = NULL; // pointer ke node pertama pada linked list

    // Alokasi memori untuk node baru
    struct node *new_node = (struct node*) malloc(sizeof(struct node));
    new_node->data = 5;
    new_node->next = NULL;

    // Tautkan node baru ke linked list
    head = new_node;

    // Tambahkan node baru ke linked list
    new_node = (struct node*) malloc(sizeof(struct node));
    new_node->data = 10;
    new_node->next = NULL;
    head->next = new_node;

    // Tampilkan isi linked list
    struct node *temp = head;
    while (temp != NULL) {
        printf("%d\n", temp->data);
        temp = temp->next;
    }

    // Bebaskan memori yang sudah tidak digunakan
    temp = head;
    while (temp != NULL) {
        struct node *next = temp->next;
        free(temp);
        temp = next;
    }

    return 0;
}
