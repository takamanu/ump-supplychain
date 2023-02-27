package main

import (
	"fmt"
	"sync"
)

func worker(id int, jobs <-chan int, results chan<- int, wg *sync.WaitGroup) {
	// Menandakan bahwa goroutine ini selesai ketika wg.Done() dipanggil
	defer wg.Done()

	// Mengiterasi melalui pekerjaan yang diterima dari channel jobs
	for j := range jobs {
		fmt.Println("worker", id, "processing job", j)
		// Menambahkan hasil dari pekerjaan ke channel results
		results <- j * 2
	}
}

func main() {
	jobs := make(chan int, 100)
	results := make(chan int, 100)

	var wg sync.WaitGroup

	// Memulai beberapa worker
	for w := 1; w <= 3; w++ {
		wg.Add(1)
		go worker(w, jobs, results, &wg)
	}

	// Mengirim beberapa pekerjaan ke channel jobs
	for j := 1; j <= 5; j++ {
		jobs <- j
	}

	// Menutup channel jobs setelah semua pekerjaan dikirim
	close(jobs)

	// Menunggu seluruh worker selesai
	wg.Wait()

	// Mengiterasi melalui hasil yang diterima dari channel results
	for a := 1; a <= 5; a++ {
		fmt.Println("result", <-results)
	}
}
